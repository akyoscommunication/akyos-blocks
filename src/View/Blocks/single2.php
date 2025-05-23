<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use Extended\ACF\Fields\Gallery;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\WYSIWYGEditor;

class single2 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("single2")
            ->setTitle("ARTICLE | 2")
            ->setCategory("single")
            ->setIcon("media-text")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/single2.jpg');
    }

    protected static function fields(): array
    {
        return [
            Image::make('Image entête', 'image')
                ->format('id')
                ->helperText('Si aucune image n\'est sélectionnée, l\'image mise en avant sera utilisée.'),
            Repeater::make('Répéteur de contenu', 'repeater_content')
                ->fields([
                    Tab::make('Contenu', 'tab_content'),
                    WYSIWYGEditor::make('Contenu', 'content'),
                    Tab::make('Images', 'tab_images'),
                    Gallery::make('Images', 'images')->format('id')->maxFiles(2),
                ])->layout('block')->minRows(1)->button('Ajouter un contenu'),

        ];
    }


    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('akyos-blocks::blocks.single2');
    }
}
