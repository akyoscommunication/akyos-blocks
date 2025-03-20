<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Wysiwyg;

class quote4 extends Block
{
    public function __construct(
    ) {
        add_filter('acf_the_content', function ($content) {
            $content = preg_replace_callback('/__(.*?)__/', function ($matches) {
                return '<span class="underline">' . $matches[1] . '</span>';
            }, $content);
            return $content;
        });
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("quote4")
            ->setTitle("CITATION | 4")
            ->setCategory("quote")
            ->setIcon("format-quote")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/quote4.jpg');
    }

    protected static function fields(): array
    {
        return [
            Wysiwyg::make("Citation", "quote")
                ->helperText('Pour souligner, utilisez la syntaxe __XXX XX__ où "XXX XX" sont les mots à souligner
            <br/> Exemple : "Voici un texte __souligné__ dans la citation"')
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('akyos-blocks::blocks.quote4');
    }
}
