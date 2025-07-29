<?php

namespace Akyos\Blocks;

use Akyos\Core\Wrappers\PostType;
use AllowDynamicProperties;
use Akyos\Blocks\Enum\AkyosBlocksCategory;
use Extended\ACF\Fields\Select;
use Extended\ACF\Location;
use Illuminate\Support\Facades\Blade;

#[AllowDynamicProperties] class AkyosBlocksLoader
{

    public static $jsonConfig;

    public $blocksDependencies = [
        'map' => ['leaflet'],
        'numbers' => ['countup'],
        'slider' => ['swiper'],
    ];

    public $jsFiles = [
        'map' => 'Map.js',
        'numbers' => 'Numbers.js',
        'slider' => 'Slider.js',
        'timeline' => 'Timeline.js',
        'accordion' => 'Accordion.js',
    ];

    public function __construct()
    {
        $this->checkRequirements();
    }

    private function checkRequirements()
    {
        $json = get_template_directory() . '/akyos-blocks.json';
        if (!file_exists($json)) {
            wp_die("Error: unable to find akyos-blocks.json");
        } else {
            self::$jsonConfig = $json;
        }
    }

    /**
     * @throws \JsonException
     */
    public function load()
    {
        $this->registerLayout();
        $this->registerBlocks();
        $this->installComposer();
        $this->editSections();
    }

    public function editSections()
    {
        $header = get_template_directory() . '/resources/views/sections/header.blade.php';
        $footer = get_template_directory() . '/resources/views/sections/footer.blade.php';

        $headerContent = file_get_contents($header);
        $footerContent = file_get_contents($footer);

        $headerContent = '{!! $layout("header") !!}';
        $footerContent = '{!! $layout("sub-footer") !!} {!! $layout("footer") !!}';

        file_put_contents($header, $headerContent);
        file_put_contents($footer, $footerContent);
    }


    public function registerLayout()
    {
        PostType::register('aky_layout', 'Disposition', 'Dispositions', 'disposition', 'layout', true)->fields([])->supports(['title', 'editor'])->make();

        register_extended_field_group([
            'title' => 'Dispositions',
            'fields' => [
                Select::make('Localisation', 'location')
                    ->choices([
                        'header' => 'Header',
                        'sub-footer' => 'Sur footer',
                        'footer' => 'Footer',
                    ])
            ],
            'location' => [
                Location::where('post_type', '===', 'aky_layout')
            ],
        ]);
    }

    /**
     * @throws \JsonException
     */
    private function registerBlocks()
    {
        $view = \Roots\view();
        $view->addNamespace('akyos-blocks', get_template_directory() . '/vendor/akyos/akyos-blocks/resources/views');

        if (file_exists(self::$jsonConfig)) {
            $blocks = json_decode(file_get_contents(self::$jsonConfig), true, 512, JSON_THROW_ON_ERROR);
            foreach ($blocks as $block) {
                $name = 'Akyos\\Blocks\\View\\Blocks\\' . $block;
                (new $name())->registerGutenberg();
            }
        }

        add_filter('block_categories_all', function ($categories) {
            return array_merge($categories, AkyosBlocksCategory::getWordPressCategories());
        });
    }

    /**
     * Installe le Composer dans le thème avec le bon namespace
     */
    private function installComposer()
    {
        $themeComposersDir = get_template_directory() . '/app/View/Composers';

        if (!is_dir($themeComposersDir)) {
            mkdir($themeComposersDir, 0755, true);
        }

        $sourceComposer = __DIR__ . '/View/Composers/Layout.php';
        $destinationComposer = $themeComposersDir . '/Layout.php';

        if (file_exists($sourceComposer) && !file_exists($destinationComposer)) {
            $composerContent = file_get_contents($sourceComposer);

            // Change le namespace pour correspondre au thème
            $composerContent = str_replace(
                'namespace Akyos\Blocks\View\Composers;',
                'namespace App\View\Composers;',
                $composerContent
            );

            file_put_contents($destinationComposer, $composerContent);
        }
    }



    public function importAssets($block)
    {
        $blockLog = [
            'Block' => $block,
            'CSS' => '',
            'JS' => '',
            'Dependencies' => '',
        ];

        if ($block === 'header') {
            $sourceFolder = __DIR__ . '/../resources/assets/css/header';
            $destinationFolder = get_template_directory() . '/resources/assets/css/blocks/header';
            $scssFiles = [];
            if (!is_dir($destinationFolder)) {
                mkdir($destinationFolder);
                $files = glob($sourceFolder . '/*');
                foreach ($files as $file) {
                    $fileToGo = str_replace($sourceFolder, $destinationFolder, $file);
                    copy($file, $fileToGo);
                    \WP_CLI::log("Copie du fichier : " . basename($file));
                    $scssFile = basename($file);
                    $scssFiles[] = $scssFile;
                }
            } else {
                $files = glob($sourceFolder . '/*');
                foreach ($files as $file) {
                    $scssFile = basename($file);
                    $scssFiles[] = $scssFile;
                }
            }
            $blockLog['CSS'] = implode(' | ', $scssFiles);
        } elseif (str_contains($block, 'blog')) {
            $sourceFolder = __DIR__ . '/../resources/assets/css/blocks/blog/' . $block;
            $destinationFolder = get_template_directory() . '/resources/assets/css/blocks/' . $block;
            if (!is_dir($destinationFolder)) {
                mkdir($destinationFolder);
                \WP_CLI::log("Création du dossier pour le bloc : " . $block);
                $files = glob($sourceFolder . '/*');
                foreach ($files as $file) {
                    $fileToGo = str_replace($sourceFolder, $destinationFolder, $file);
                    copy($file, $fileToGo);
                    \WP_CLI::log("Copie du fichier : " . basename($file));
                    $scssFile = basename($file);
                    $blockLog['CSS'] .= $scssFile;
                }
            } else {
                $blockLog['CSS'] = basename($destinationFolder);
            }
        } else {
            $sourceFile = __DIR__ . '/../resources/assets/css/blocks/_' . $block . '.scss';
            $destinationFile = get_template_directory() . '/resources/assets/css/blocks/_' . $block . '.scss';
            if (file_exists($sourceFile) && !file_exists($destinationFile)) {
                copy($sourceFile, $destinationFile);
                \WP_CLI::log("Copie du fichier SCSS pour le bloc : " . $block);
                $scssFile = basename($sourceFile);
                $blockLog['CSS'] = $scssFile;
            } else if (file_exists($sourceFile) && file_exists($destinationFile)) {
                \WP_CLI::log("Fichier SCSS déjà existant : " . $block);
                $blockLog['CSS'] = "X";
            } else if (!file_exists($sourceFile)) {
                \WP_CLI::log("Fichier SCSS non existant : " . $block);
                $blockLog['CSS'] = "X";
            }
        }

        $blockCategory = substr($block, 0, -1);

        if (isset($this->jsFiles[$blockCategory])) {
            $sourceFile = __DIR__ . '/../resources/assets/js/components/' . $this->jsFiles[$blockCategory];
            $destinationFile = get_template_directory() . '/resources/assets/js/components/' . $this->jsFiles[$blockCategory];
            if (file_exists($sourceFile) && !file_exists($destinationFile)) {
                copy($sourceFile, $destinationFile);
                $jsFile = basename($sourceFile);
                $blockLog['JS'] = $jsFile;
            } else {
                $blockLog['JS'] = basename($destinationFile);
            }
        } else {
            $blockLog['JS'] = 'X';
        }

        if (isset($this->blocksDependencies[$blockCategory])) {
            // Add dependencies to package.json
            $packageJson = get_template_directory() . '/package.json';
            foreach ($this->blocksDependencies[$blockCategory] as $dependency) {
                $blockLog['Dependencies'] .= $dependency;
                $config = json_decode(file_get_contents($packageJson), true, 512, JSON_THROW_ON_ERROR);
                if (!isset($config['dependencies'][$dependency])) {
                    $config['dependencies'][$dependency] = '*';
                    file_put_contents($packageJson, json_encode($config, JSON_PRETTY_PRINT));
                    \WP_CLI::log("Ajout de la dépendance : " . $dependency . " dans package.json");
                }
            }
        } else {
            $blockLog['Dependencies'] = 'X';
        }

        return $blockLog;
    }
}
