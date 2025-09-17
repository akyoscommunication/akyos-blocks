<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;

class services2 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("services2")
            ->setTitle("SERVICES | 2")
            ->setCategory("services")
            ->setIcon("admin-generic")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/services2.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Services"),
            Number::make("Nombre de services par slide", "cards_per_slide"),
            Number::make("Espacement entre les services", "cards_spacing"),
            Repeater::make("Services", "cards")
                ->fields([
                    Image::make("Image", "image")
                        ->column(15)
                        ->format('id'),
                    Title::make("Titre", "title"),
                    Wysiwyg::make("Description", "description"),
                    Button::make("Bouton", "button"),
                ])
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('akyos-blocks::blocks.services2');
    }
}
