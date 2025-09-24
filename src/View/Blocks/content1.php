<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\ButtonGroup;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Image;

class content1 extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("content1")
            ->setTitle("CONTENU | 1")
            ->setCategory("content")
            ->setIcon("align-left")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/content1.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make('Général'),
            Title::make('Titre', 'title'),
            WYSIWYGEditor::make('Texte', 'content'),
            Button::make('Bouton', 'button'),
            Tab::make('Images', 'images_tab'),
            FlexibleContent::make('Contenu', 'images')
                ->button('Ajouter un contenu')
                ->layouts([
                    Layout::make('Image', 'image')
                        ->layout('block')
                        ->fields([
                            Image::make('Image', 'image')
                                ->format('id'),
                        ]),
                    Layout::make('Video Youtube', 'video_youtube')
                        ->layout('block')
                        ->fields([
                            Text::make('URL Youtube', 'url'),
                        ]),
                ]),
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
        if (file_exists(get_template_directory() . '/resources/views/blocks/content1.blade.php')) {
            return view('blocks.content1');
        } else {
            return view('akyos-blocks::blocks.content1');
        }
    }
}
