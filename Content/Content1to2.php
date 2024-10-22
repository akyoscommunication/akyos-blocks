<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Alignement;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\Image;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;

class Content1to2 extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("content1to2")
            ->setTitle("Bloc de contenu, style 1 à 2")
            ->setCategory("content")
            ->setIcon("align-pull-left");
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            WYSIWYGEditor::make('Contenu', 'content')
                ->required(),
            Button::make('Bouton', 'button'),
            Image::make('Image', 'image')
                ->format('id')
                ->required(),
            Tab::make('Options'),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '1-1' => 'Style 1-1 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-1-1.png" alt="Style 1-1" />',
                    '1-2' => 'Style 1-2 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-1-2.png" alt="Style 1-2" />',
                    '1-3' => 'Style 1-3 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-1-3.png" alt="Style 1-3" />',
                    '1-4' => 'Style 1-4 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-1-4.png" alt="Style 1-4" />',
                ])->default('1-1'),
            Alignement::make("Alignement", "order")
        ];
    }

    public function render()
    {
        return $this->view("blocks.contents.content");
    }
}
