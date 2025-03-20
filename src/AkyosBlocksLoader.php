<?php

namespace Akyos\Blocks;

use Akyos\Core\Wrappers\PostType;
use Extended\ACF\Fields\Select;
use Extended\ACF\Location;
use Illuminate\Support\Facades\Blade;

class AkyosBlocksLoader
{
    public function __construct()
    {
        $this->checkRequirements();
    }

    private function checkRequirements()
    {
        $json = get_template_directory() . '/akyos-blocks.json';
        if (!file_exists($json)) {
            wp_die("Error: unable to find akyos-blocks.json");
        }
    }

    public function load()
    {
        $this->registerLayout();
        $this->registerBlocks();
    }

    private function registerLayout()
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

    private function registerBlocks()
    {
        $view = \Roots\view();
        $view->addNamespace('akyos-blocks', get_template_directory() . '/vendor/akyos/akyos-blocks/resources/views');

        $akyos_blocks = get_template_directory() . '/akyos-blocks.json';
        if (file_exists($akyos_blocks)) {
            $blocks = json_decode(file_get_contents($akyos_blocks), true, 512, JSON_THROW_ON_ERROR);
            foreach ($blocks as $block) {
                $name = 'Akyos\\Blocks\\View\\Blocks\\' . $block;
                (new $name())->registerGutenberg();
            }
        }
    }
}
