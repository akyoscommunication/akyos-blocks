<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;

class quote1 extends Block
{
    public function __construct()
    {
        add_filter('acf_the_content', function ($content) {
            $content = preg_replace_callback('/\[img-(\d+)\]/', function ($matches) {
                $image = get_field('images')[$matches[1] - 1]['image'];
                return wp_get_attachment_image($image, 'thumbnail');
            }, $content);
            return $content;
        });
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("quote1")
            ->setTitle("CITATION | 1")
            ->setCategory("quote")
            ->setIcon("format-quote")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/quote1.jpg');
    }

    protected static function fields(): array
    {
        return [
            Repeater::make("Images", "images")
                ->fields([
                    Image::make("Image", "image")
                        ->previewSize('thumbnail')
                        ->format('id')
                ])
                ->button('Ajouter une image'),
            Wysiwyg::make("Citation", "quote")
            ->helperText('Pour ajouter une image dans la citation, utilisez la syntaxe [img-X] où "X" est le numéro de la ligne du champ "Images"
            <br/> Exemple : "Voici une image [img-1] dans la citation"')
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('akyos-blocks::blocks.quote1');
    }
}
