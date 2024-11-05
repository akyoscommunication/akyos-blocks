<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;

class AkyB_Content5
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            Repeater::make('Contenus', 'contents')
                ->fields([
                    Title::make('Titre', 'title')
                        ->required(),
                    Text::make('Texte', 'text')
                        ->required(),
                ])->maxRows(3),
        ])->layout($layout);
    }
}
