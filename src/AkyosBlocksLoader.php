<?php

namespace Akyos\Blocks;

use Akyos\Core\Wrappers\PostType;
use AllowDynamicProperties;
use Akyos\Blocks\Enum\AkyosBlocksCategory;
use Akyos\Blocks\Catalog\Catalog;
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
        Catalog::getInstance();
        $this->checkRequirements();
    }

    private function checkRequirements()
    {
        $json = get_template_directory() . '/akyos-blocks.json';
        if (!file_exists($json)) {
            if (!isset($_GET['page']) || $_GET['page'] !== 'akyos-blocks-catalog') {
                if (!wp_doing_ajax()) {
                    wp_redirect(admin_url('admin.php?page=akyos-blocks-catalog'));
                    exit;
                }
            }
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
        $this->editSections();
    }

    public function editSections()
    {
        $this->createLayoutDirective();
        $this->ensureLayoutCalls();
    }

    private function createLayoutDirective()
    {
        add_action('after_setup_theme', function () {
            \Illuminate\Support\Facades\Blade::directive('layout', function ($expression) {
                return "<?php 
                    \$post = new \\WP_Query([
                        'post_type' => 'aky_layout'
                    ]);
                    
                    \$layout = trim($expression, '\\'\"');
                    
                    if (\$post->have_posts()) {
                        while (\$post->have_posts()) {
                            \$post->the_post();
                            if (get_field('location') === \$layout) {
                                foreach (parse_blocks(get_the_content()) as \$block) {
                                    echo render_block(\$block);
                                }
                            }
                        }
                        wp_reset_postdata();
                    }
                ?>";
            });
        });
    }

    private function ensureLayoutCalls()
    {
        $header = get_template_directory() . '/resources/views/sections/header.blade.php';
        $footer = get_template_directory() . '/resources/views/sections/footer.blade.php';

        // Vérifie si les sections contiennent déjà l'appel aux layouts
        $headerContent = file_exists($header) ? file_get_contents($header) : '';
        $footerContent = file_exists($footer) ? file_get_contents($footer) : '';

        if (!str_contains($headerContent, '@layout') && !str_contains($headerContent, '$layout')) {
            $newHeaderContent = "@layout('header')\n\n" . $headerContent;
            file_put_contents($header, $newHeaderContent);
        }

        if (!str_contains($footerContent, '@layout') && !str_contains($footerContent, '$layout')) {
            $newFooterContent = "@layout('sub-footer')\n@layout('footer')\n\n" . $footerContent;
            file_put_contents($footer, $newFooterContent);
        }
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
