<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\WYSIWYGEditor;

class AkyB_Content6to7
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
                    Image::make('Image', 'image')->format('id'),
                    WYSIWYGEditor::make('Contenu', 'content')
                        ->required(),
                    AkyB_Button::make('Bouton', 'button')
                ])->maxRows(3)->collapsed('title')->layout('block'),
            Tab::make('Options'),
        ])->layout($layout);
    }
}
