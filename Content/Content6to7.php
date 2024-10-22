<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\WYSIWYGEditor;

class Content6to7 extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("content6to7")
            ->setTitle("Bloc de contenu, style 6 à 7")
            ->setCategory("content")
            ->setIcon("align-pull-left");
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            Button::make('Bouton', 'button_title')
                ->conditionalLogic([
                ConditionalLogic::where('style', '==', '7')
            ]),
            Repeater::make('Contenus', 'contents')
                ->fields([
                    Title::make('Titre', 'title')
                        ->required(),
                    WYSIWYGEditor::make('Contenu', 'content')
                        ->required(),
                    Button::make('Bouton', 'button')
                ])->maxRows(3),
            Tab::make('Options'),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '6' => 'Style 6 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-6.png" alt="Style 6" />',
                    '7' => 'Style 7 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-7.png" alt="Style 7" />',
                ])->layout('vertical'),

        ];
    }

    public function render()
    {
        return $this->view("blocks.contents.content");
    }
}
