<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\WYSIWYGEditor;

class AkyB_Content13
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            WYSIWYGEditor::make('Contenu', 'content'),
            WYSIWYGEditor::make('Contenu de droite', 'right-content'),
        ])->layout($layout);
    }
}
