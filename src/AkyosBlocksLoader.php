<?php

namespace Akyos\Blocks;

use Akyos\Core\Wrappers\PostType;
use AllowDynamicProperties;
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

        Blade::directive('layoutLocation', static function ($expression) {
            return "<?php echo $expression ?>";
        });
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
    }


    public function importAssets($block)
    {
        $blockLog = [
            'Block' => $block,
            'CSS' => '',
            'JS' => '',
            'Dependencies' => '',
        ];

        if (str_contains($block, 'blog')) {
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
            } else {
                // add an emoji
                $blockLog['CSS'] = " ".basename($destinationFile);
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
