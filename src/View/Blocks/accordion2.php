<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Gallery;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;

class accordion2 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("accordion2")
            ->setTitle("ACCORDEON | 2")
            ->setCategory("accordion")
            ->setIcon("editor-justify")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/accordion2.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Accordéons"),
            Repeater::make("Accordéons", "accordions")
                ->fields([
                    Text::make("Titre", "title")
                        ->column(60),
                    Button::make("Bouton", "button")
                        ->column(40),
                    Wysiwyg::make("Contenu", "content")
                        ->column(70),
                    Gallery::make("Images", "images")
                        ->format('id')
                        ->column(30),
                ])
                ->collapsed("title")
                ->layout("block")
                ->button("Ajouter un accordéon"),
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        if (file_exists(get_template_directory() . '/resources/views/blocks/accordion2.blade.php')) {
            return view('blocks.accordion2');
        } else {
            return view('akyos-blocks::blocks.accordion2');
        }
    }
}
