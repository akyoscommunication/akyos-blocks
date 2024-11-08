<?php

namespace Akyos\Blocks\Acf\Fields;

use Akyos\Blocks\Acf\Fields\AkyB_Button;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;

class AkyB_Content12
{
    public static function make(string $label, string $id, $layout = 'table')
    {
        return Group::make($label, $id)->fields([
            Title::make('Titre', 'title'),
            Repeater::make('Onglets', 'tabs')
                ->fields([
                    Text::make('Titre de l\'onglet', 'title'),
                    WYSIWYGEditor::make('Contenu de l\'onglet', 'content'),
                    Repeater::make('Contenu de l\'onglet', 'content-tab')
                        ->fields([
                            Title::make('Titre', 'title'),
                            WYSIWYGEditor::make('Description', 'description'),
                            Repeater::make('Images', 'images')
                                ->fields([
                                    Image::make('Image', 'image')
                                        ->format('id'),
                                ])
                                ->layout('block')
                                ->button('Ajouter une image'),
                            AkyB_Button::make('Bouton', 'button'),
                        ])
                        ->layout('block')
                        ->button('Ajouter un contenu')
                        ->collapsed('app')
                ])
                ->layout('block')
                ->button('Ajouter un onglet')
                ->collapsed('title'),
        ])->layout($layout);
    }
}
