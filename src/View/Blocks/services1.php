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

class services1 extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("services1")
            ->setTitle("SERVICES | 1")
            ->setCategory("services")
            ->setIcon("admin-generic")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/services1.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Services"),
            Repeater::make("Services", "cards")
                ->fields([
                    Image::make("Image", "image")
                        ->column(15)
                        ->format('id'),
                    Title::make("Titre", "title"),
                    Wysiwyg::make("Description", "description"),
                ])
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('blocks.services1');
    }
}
