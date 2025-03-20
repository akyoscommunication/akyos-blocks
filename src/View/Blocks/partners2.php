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

class partners2 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("partners2")
            ->setTitle("PARTENAIRES | 2")
            ->setCategory("partner")
            ->setIcon("groups")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/partners2.jpg')
            ;
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Partenaires"),
            Repeater::make("Partenaires", "partners")
                ->fields([
                    Image::make("Image", "image")
                        ->format('id')
                ])
                ->button("Ajouter un partenaire"),
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('blocks.partners2');
    }
}
