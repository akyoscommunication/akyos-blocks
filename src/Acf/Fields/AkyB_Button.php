<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Colors;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Select;

class AkyB_Button
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Link::make('Lien', 'link'),
            Colors::make('Couleur', 'color'),
            Select::make('Border radius', 'borderradius')
                ->choices([
                    'rounded' => 'Arrondi',
                    'small_rounded' => 'Arrondi petit',
                    'square' => 'Carré',
                ]),
            Icons::make('Icon', 'icon'),
            Select::make('Icon position', 'iconposition')
                ->choices([
                    'left' => 'Gauche',
                    'right' => 'Droite',
                ])->default('left')->ConditionalLogic([
                    ConditionalLogic::where('icon', '!=', null),
                ]),

        ])->layout($layout);
    }
}
