<?php

namespace Akyos\Blocks\Acf\Fields;

use App\Acf\Fields\Title;
use Extended\ACF\Fields\ColorPicker;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;

class AkyB_Pricing1
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Tab::make('Contenu'),
            Title::make('Titre', 'title')
                ->required(),
            Textarea::make('Contenu', 'content'),
            Repeater::make('Prix', 'prices')
                ->fields([
                    ColorPicker::make('Couleur', 'color'),
                    Text::make('Titre', 'title')
                        ->required(),
                    Textarea::make('Description', 'description'),
                    Text::make('Prix et Monnaie', 'price'),
                    Text::make('Prix par', 'price_per'),
                    Repeater::make('Caractéristiques', 'features')
                        ->fields([
                            Text::make('Caractéristique', 'feature')
                        ])->collapsed('features'),
                    AkyB_Button::make('Bouton', 'price_button'),
                ])->layout('block')->collapsed('color'),
            AkyB_Button::make('Bouton', 'button'),
        ])->layout($layout);
    }
}
