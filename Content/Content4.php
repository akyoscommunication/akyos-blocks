<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Alignement;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;

class Content4 extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("content4")
            ->setTitle("Bloc de contenu, style 4")
            ->setCategory("content")
            ->setIcon("align-pull-left");
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Number::make('Info', 'info'),
            Title::make('Titre', 'title')
                ->required(),
            WYSIWYGEditor::make('Contenu', 'content'),
            Button::make('Bouton', 'button'),
            Tab::make('Options'),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '4' => 'Style 4 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-4.png" alt="Style 4" />',
                ])->layout('vertical'),
            Select::make('Alignement du contenu', 'order')
                ->choices([
                    'left' => 'Gauche',
                    'right' => 'Droite',
                ])->default('left'),
        ];
    }

    public function render()
    {
        return $this->view("blocks.contents.content");
    }
}
