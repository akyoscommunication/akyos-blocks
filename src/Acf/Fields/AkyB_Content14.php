<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;

class AkyB_Content14
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Text::make('Contenu', 'content'),
            Repeater::make('Liste', 'list')
                ->fields([
                    Image::make('Image', 'image')
                        ->format('id'),
                    WYSIWYGEditor::make('Contenu', 'content'),
                ])->collapsed('image')->layout('block'),
        ])->layout($layout);
    }
}
