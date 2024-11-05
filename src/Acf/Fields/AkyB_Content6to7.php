<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\WYSIWYGEditor;

class AkyBContent6To7
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            AkyB_Button::make('Bouton', 'button_title'),
            Repeater::make('Contenus', 'contents')
                ->fields([
                    Title::make('Titre', 'title')
                        ->required(),
                    WYSIWYGEditor::make('Contenu', 'content')
                        ->required(),
                    AkyB_Button::make('Bouton', 'button')
                ])->maxRows(3),
            Tab::make('Options'),
        ])->layout($layout);
    }
}
