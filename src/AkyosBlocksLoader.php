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
        'number' => ['countup'],
        'slider' => ['swiper'],
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
        $blockLog = [];

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
                    $blockLog = [
                        'Bloc' => $block,
                        'CSS' => $scssFile,
                        'JS' => ''
                    ];
                }
            } else {
                $blockLog = [
                    'Bloc' => $block,
                    'CSS' => 'already imported',
                    'JS' => ''
                ];
            }
        } else {
            $sourceFile = __DIR__ . '/../resources/assets/css/blocks/_' . $block . '.scss';
            $destinationFile = get_template_directory() . '/resources/assets/css/blocks/_' . $block . '.scss';
            if (file_exists($sourceFile) && !file_exists($destinationFile)) {
                copy($sourceFile, $destinationFile);
                \WP_CLI::log("Copie du fichier SCSS pour le bloc : " . $block);
                $scssFile = basename($sourceFile);
                $blockLog = [
                    'Bloc' => $block,
                    'CSS' => $scssFile,
                    'JS' => ''
                ];
            } else {
                $blockLog = [
                    'Bloc' => $block,
                    'CSS' => 'already imported',
                    'JS' => ''
                ];
            }
        }

        $blockCategory = substr($block, 0, -1);
        if (isset($this->blocksDependencies[$blockCategory])) {
            $packageJson = get_template_directory() . '/package.json';
            foreach ($this->blocksDependencies[$blockCategory] as $dependency) {
                $config = json_decode(file_get_contents($packageJson), true, 512, JSON_THROW_ON_ERROR);
                if (!isset($config['dependencies'][$dependency])) {
                    $config['dependencies'][$dependency] = '*';
                    file_put_contents($packageJson, json_encode($config, JSON_PRETTY_PRINT));
                    \WP_CLI::log("Ajout de la dépendance : " . $dependency . " dans package.json");

                    $blockLog['JS'] = $dependency;
                } else {
                    $blockLog['JS'] = 'already imported';
                }
            }
        } else {
            $blockLog['JS'] = 'none';
        }

        return $blockLog;
    }
}
