<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\PostObject;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;

class AkyB_Form2
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            PostObject::make('Formulaire', 'form')->postTypes(['forminator_forms'])->format('id'),
            Select::make('Image ou Carte', 'image_or_map')
                ->choices([
                    'image' => 'Image',
                    'map' => 'Carte',
                ])->default('image'),
            Text::make('Lien iframe Google maps', 'maps')
                ->conditionalLogic([
                    ConditionalLogic::where('image_or_map', '==', 'map')
                ]),
            Image::make('Image', 'image')
                ->Format('id')
                ->conditionalLogic([
                    ConditionalLogic::where('image_or_map', '==', 'image')
                ]),
        ])->layout($layout);
    }
}
