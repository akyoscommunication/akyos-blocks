<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;

class slider5 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("slider5")
            ->setTitle("SLIDER | 5")
            ->setCategory("slider")
            ->setIcon("slides")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/slider5.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Slider"),
            Repeater::make("Slides", "slides")
                ->fields([
                    Image::make("Image", "image")
                        ->format('id')
                ])
                ->button("Ajouter un slide"),
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('blocks.slider5');
    }
}
