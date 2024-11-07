<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;

class AkyB_Numbers2
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make('Contenu'),
            Title::make('Titre', 'title')
                ->required(),
            Text::make('Contenu', 'content'),
            AkyB_Button::make('Bouton', 'button'),
            Repeater::make('Nombres', 'numbers')
                ->fields([
                    Text::make('Nombre', 'number')
                        ->required(),
                    WYSIWYGEditor::make('Description', 'description'),
                ])->required()->maxRows(4),
        ])->layout($layout);
    }
}
