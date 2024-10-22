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

class Content9 extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("content9")
            ->setTitle("Bloc de contenu, style 9")
            ->setCategory("content")
            ->setIcon("align-pull-left");
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Repeater::make('Contenu', 'contents')
                ->fields([
                    Title::make('Titre', 'title'),
                    WYSIWYGEditor::make('Contenu', 'content'),
                    Image::make('Image', 'image')
                        ->format('id'),
                    Select::make('Position', 'order')
                        ->choices([
                            'left' => 'Gauche',
                            'right' => 'Droite',
                        ])->default('left'),
                ])->layout('block')->collapsed('title'),

            Tab::make('Options'),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '9' => 'Style 9 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-9.png" alt="Style 8" />',
                ])->layout('vertical'),
        ];
    }

    public function render()
    {
        return $this->view("blocks.contents.content");
    }
}
