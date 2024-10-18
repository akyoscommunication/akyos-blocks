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
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;

class Content5 extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("content5")
            ->setTitle("Bloc de contenu, style 5")
            ->setCategory("content")
            ->setIcon("align-pull-left");
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title')
                ->required(),
            Repeater::make('Contenus', 'contents')
                ->fields([
                    Title::make('Titre', 'title')
                        ->required(),
                    Text::make('Texte', 'text')
                        ->required(),
                ])->maxRows(3),
            Tab::make('Options'),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '5' => 'Style 5 : ',
                ])->layout('vertical'),
        ];
    }

    public function render()
    {
        return $this->view("blocks.contents.content");
    }
}
