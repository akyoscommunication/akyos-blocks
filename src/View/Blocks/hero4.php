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

class hero4 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("hero4")
            ->setTitle("HERO | 4")
            ->setCategory("header")
            ->setIcon("admin-comments")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/hero4.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Repeater::make("Boutons", "buttons")
                ->fields([
                    Button::make("Bouton", "button")
                ])
                ->button("Ajouter un bouton"),
            Tab::make("Images"),
            Image::make('Image', 'image')
                ->minWidth(1200)
                ->format('id'),
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('blocks.hero4');
    }
}
