<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\WYSIWYGEditor;

class AkyB_Content8
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            WYSIWYGEditor::make('Contenu', 'content'),
            AkyB_Button::make('Bouton', 'button'),
            Image::make('Image', 'image')
                ->format('url')
                ->required(),
            Tab::make('Options'),
            Select::make('Alignement du contenu', 'order')
                ->choices([
                    'left' => 'Gauche',
                    'center' => 'Centre',
                    'right' => 'Droite',
                ])->default('left'),
        ])->layout($layout);
    }
}
