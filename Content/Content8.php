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
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Fields\Image;

class Content8 extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("content8")
            ->setTitle("Bloc de contenu, style 8")
            ->setCategory("content")
            ->setIcon("align-pull-left");
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            WYSIWYGEditor::make('Contenu', 'content'),
            Button::make('Bouton', 'button'),
            Image::make('Image', 'image')
                ->format('url')
                ->required(),
            Tab::make('Options'),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '8' => 'Style 8 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-8.png" alt="Style 8" />',
                ])->layout('vertical'),
            Select::make('Alignement du contenu', 'order')
                ->choices([
                    'left' => 'Gauche',
                    'center' => 'Centre',
                    'right' => 'Droite',
                ])->default('left'),
        ];
    }

    public function render()
    {
        return $this->view("blocks.contents.content");
    }
}
