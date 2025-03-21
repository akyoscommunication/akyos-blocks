<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\PostObject;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\TrueFalse;

class Footer2 extends Block
{
    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName('footer2')
            ->setTitle("FOOTER | 2")
            ->setCategory("layout")
            ->setIcon("layout")
            ->setPreviewImage(get_template_directory_uri().'/vendor/akyos/akyos-blocks/resources/assets/previews/footer2.jpg');
    }

    protected static function fields(): array
    {
        return [
            Image::make('Logo', 'logo')->format('id'),
            Textarea::make('Description', 'description')->column(33)->newLines('br'),
            Textarea::make('Horaires', 'horaires')->column(33)->newLines('br'),
            Textarea::make('Adresse', 'address')->column(33)->newLines('br'),
            PostObject::make('Formulaire de newsletter', 'newsletter_form')->postTypes(['forminator_forms'])->column(50),
            TrueFalse::make('Afficher les réseaux sociaux', 'display_socials')->column(50)->stylized(),
        ];
    }

    public function render()
    {
        return view('akyos-blocks::blocks.footer2');
    }
}
