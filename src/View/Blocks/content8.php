<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\ButtonGroup;
use Extended\ACF\Fields\Gallery;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;

class content8 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("content8")
            ->setTitle("CONTENU | 8")
            ->setCategory("content")
            ->setIcon("align-left")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/content8.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make('Général'),
            Title::make('Titre', 'title'),
            WYSIWYGEditor::make('Texte', 'content'),
            Button::make('Bouton', 'button'),
            Tab::make('Images', 'images_tab'),
            Gallery::make('Images', 'images')
                ->format('id'),
            Tab::make('Options', 'options'),
            Text::make("Classe CSS", 'extra_class'),
            ButtonGroup::make('Position du contenu', 'position')
                ->choices([
                    'default' => 'Contenu / Image',
                    'reverse' => 'Image / Contenu'
                ])->default('default'),
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('akyos-blocks::blocks.content8');
    }
}
