<?php

namespace AkyosBlocks\Hero;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\CustomFields\StyleSelector\StyleSelectorField;
use App\Acf\Fields\Title;
use App\Acf\Fields\Button;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\WYSIWYGEditor;

class Hero extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("hero")
            ->setTitle("Entête page d'accueil")
            ->setCategory("header")
            ->setIcon("admin-site");
    }

    protected static function fields(): array
    {
        return [
            Tab::make('Contenu'),
            Title::make('Titre', 'title')
                ->required(),
            WYSIWYGEditor::make('Contenu', 'content'),
            Repeater::make('Images', 'images')
                ->fields([
                    Image::make('Image', 'image')
                        ->format('id'),
                ])->required(),
            Repeater::make('Boutons', 'buttons')
                ->fields([
                    Button::make('Bouton', 'button'),
                ]),
            Tab::make('Options'),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '1' => 'Style 1 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/vendor/akyos/akyos-blocks/Hero/images/Style-1.png" alt="Style 1" />',
                    '2' => 'Style 2 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/vendor/akyos/akyos-blocks/Hero/images/Style-2.png" alt="Style 2" />',
                    '3' => 'Style 3  : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/vendor/akyos/akyos-blocks/Hero/images/Style-3.png" alt="Style 3" />',
                    '4' => 'Style 4  : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/vendor/akyos/akyos-blocks/Hero/images/Style-4.png" alt="Style 4" />',
                ])->layout('vertical'),
        ];
    }

    public function render()
    {
        return $this->view("blocks.heros.hero");
    }
}
