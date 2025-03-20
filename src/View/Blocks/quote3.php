<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;

class quote3 extends Block
{
    public function __construct()
    {
        add_filter('acf_the_content', function ($content) {

            $content = preg_replace_callback('/\[icone-(\d+)\]/', function ($matches) {
                $image = get_field('icons')[$matches[1] - 1]['icon'];
                return wp_get_attachment_image($image, 'thumbnail');
            }, $content);

            $content = preg_replace_callback('/#(.*?)#/', function ($matches) {
                return '<span class="color-primary">' . $matches[1] . '</span>';
            }, $content);

            return $content;
        });
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("quote3")
            ->setTitle("CITATION | 3")
            ->setCategory("quote")
            ->setIcon("format-quote")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/quote3.jpg');
    }

    protected static function fields(): array
    {
        return [
            Repeater::make("Icones", "icons")
                ->fields([
                    Image::make("Icone", "icon")
                        ->previewSize('thumbnail')
                        ->format('id')
                ])
                ->button('Ajouter une image'),
            Wysiwyg::make("Citation", "quote")
                ->helperText('Pour ajouter une icône dans la citation, utilisez la syntaxe [icone-X] où "X" est le numéro de la ligne du champ "Icones"
            <br/> Exemple : "Voici une icône [icone-1] dans la citation"
            <br/><br/> Pour styliser du texte, utilisez la syntaxe #XXXXXX# où "XXXXXX" est le texte à styliser
            <br/> Exemple : "Voici un texte #styliser# dans la citation"')
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('blocks.quote3');
    }
}
