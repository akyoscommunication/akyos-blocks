<?php

namespace App\Acf\Fields;

use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\ButtonGroup;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\WYSIWYGEditor;

class Content6to7
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            Button::make('Bouton', 'button_title'),
            Repeater::make('Contenus', 'contents')
                ->fields([
                    Title::make('Titre', 'title')
                        ->required(),
                    WYSIWYGEditor::make('Contenu', 'content')
                        ->required(),
                    Button::make('Bouton', 'button')
                ])->maxRows(3),
            Tab::make('Options'),
        ])->layout($layout);
    }
}
