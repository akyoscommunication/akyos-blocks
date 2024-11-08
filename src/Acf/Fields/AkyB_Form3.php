<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Akyos\Blocks\Acf\Fields\AkyB_Button;

class AkyB_Form3
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            Text::make('Texte', 'text'),
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
            AkyB_Button::make('Bouton', 'button'),
        ])->layout($layout);
    }
}
