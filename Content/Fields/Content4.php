<?php

namespace App\Acf\Fields;

use Extended\ACF\Fields\ButtonGroup;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\WYSIWYGEditor;

class Content4
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Number::make('Info', 'info'),
            Title::make('Titre', 'title')
                ->required(),
            WYSIWYGEditor::make('Contenu', 'content'),
            Button::make('Bouton', 'button'),
            Tab::make('Options'),
            Select::make('Alignement du contenu', 'order')
                ->choices([
                    'left' => 'Gauche',
                    'right' => 'Droite',
                ])->default('left'),
        ])->layout($layout);
    }
}
