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
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\TrueFalse;

class numbers3 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("numbers3")
            ->setTitle("CHIFFRES CLES | 3")
            ->setCategory("numbers")
            ->setIcon("editor-ol")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/numbers3.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Chiffres clés"),
            Repeater::make("Chiffres clés", "numbers")
                ->fields([
                    Image::make("Icône", "icon")
                        ->column(15)
                        ->format('id'),
                    Text::make("Nombre", "number")
                        ->column(15),
                    Text::make("Symbole", "symbol")->column(10),
                    TrueFalse::make("Position symbole", "position")
                        ->stylized('Avant', 'Après')->column(10),
                    Wysiwyg::make("Description", "description"),
                ])
                ->button("Ajouter un chiffre clé")
                ->collapsed('number')
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('akyos-blocks::blocks.numbers3');
    }
}
