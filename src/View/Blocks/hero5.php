<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\File;
use Extended\ACF\Fields\TrueFalse;

class hero5 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("hero5")
            ->setTitle("HERO | 5")
            ->setCategory("header")
            ->setIcon("admin-comments")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/hero5.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Repeater::make("Boutons", "buttons")
                ->fields([
                    Button::make("Bouton", "button")
                ])
                ->button("Ajouter un bouton"),
            Tab::make("Images"),
            FlexibleContent::make('Contenu', 'image')
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
                            // mute
                            TrueFalse::make('Mute', 'mute'),
                            // show controls
                            TrueFalse::make('Show controls', 'show_controls'),
                            // autoplay
                            TrueFalse::make('Autoplay', 'autoplay'),
                            // loop
                            TrueFalse::make('Loop', 'loop'),
                            // show info
                            TrueFalse::make('Show info', 'show_info'),
                            // frameborder
                            TrueFalse::make('Frameborder', 'frameborder'),
                        ]),
                    Layout::make('Video', 'video')
                        ->layout('block')
                        ->fields([
                            File::make('Video', 'video'),
                            // mute
                            TrueFalse::make('Mute', 'mute'),
                            // autoplay
                            TrueFalse::make('Autoplay', 'autoplay'),
                            // loop
                            TrueFalse::make('Loop', 'loop'),
                        ]),
                ])->maxLayouts(1),
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        if (file_exists(get_template_directory() . '/resources/views/blocks/hero5.blade.php')) {
            return view('blocks.hero5');
        } else {
            return view('akyos-blocks::blocks.hero5');
        }
    }
}
