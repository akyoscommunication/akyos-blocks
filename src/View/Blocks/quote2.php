<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;

class quote2 extends Block
{
    public function __construct(
    ) {
        add_filter('acf_the_content', function ($content) {
            $content = preg_replace_callback('/%(\w)%/', function ($matches) {
                return '<span>' . $matches[1] . '</span>';
            }, $content);
            return $content;
        });
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("quote2")
            ->setTitle("CITATION | 2")
            ->setCategory("quote")
            ->setIcon("format-quote")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/quote2.jpg');
    }

    protected static function fields(): array
    {
        return [
            Wysiwyg::make("Citation", "quote")
                ->helperText('Pour styliser une lettre, utilisez la syntaxe %X% où "X" est la lettre à styliser
            <br/> Exemple : "Voici une lettre stylisée %A% dans la citation"')
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        if (file_exists(get_template_directory() . '/resources/views/blocks/quote2.blade.php')) {
            return view('blocks.quote2');
        } else {
            return view('akyos-blocks::blocks.quote2');
        }
    }
}
