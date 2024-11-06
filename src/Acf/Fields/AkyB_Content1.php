<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Alignement;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\WYSIWYGEditor;

class AkyB_Content1
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            WYSIWYGEditor::make('Contenu', 'content')
                ->required(),
            AkyB_Button::make('Bouton', 'button'),
            Image::make('Image', 'image')
                ->format('id')
                ->required(),
            Tab::make('Options'),
            Alignement::make("Alignement", "order")
        ])->layout($layout);
    }
}
