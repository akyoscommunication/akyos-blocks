<?php

namespace App\Acf\Fields;

use Extended\ACF\Fields\ButtonGroup;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\WYSIWYGEditor;

class Numbers2
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make('Contenu'),
            Title::make('Titre', 'title')
                ->required(),
            Text::make('Contenu', 'content'),
            Button::make('Bouton', 'button'),
            Repeater::make('Nombres', 'numbers')
                ->fields([
                    Number::make('Nombre', 'number')
                        ->required(),
                    WYSIWYGEditor::make('Description', 'description'),
                ])->required()->maxRows(4),
        ])->layout($layout);
    }
}
