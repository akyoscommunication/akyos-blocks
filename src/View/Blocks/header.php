<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\TrueFalse;

class header extends Block
{
    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName('header')
            ->setTitle('Barre de navigation')
            ->setCategory('layout')
            ->setIcon('layout')
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/header.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make('Menu'),
            TrueFalse::make('Recherche', 'search')->stylized(),
            Image::make('Logo', 'logo')->format('id'),
            Image::make('Logo au scroll', 'logo_scroll')->format('id'),
            Button::make('Bouton', 'button'),
            Tab::make('Topbar'),
            TrueFalse::make('Téléphone', 'phone')->stylized()->column(25),
            TrueFalse::make('Email', 'email')->stylized()->column(25),
            TrueFalse::make('Adresse', 'address')->stylized()->column(25),
            TrueFalse::make('Réseaux sociaux', 'socials')->stylized()->column(25),
            Button::make('Bouton', 'button_topbar'),

        ];
    }

    public function render()
    {
        if (file_exists(get_template_directory() . '/resources/views/blocks/header.blade.php')) {
            return view('blocks.header');
        } else {
            return view('akyos-blocks::blocks.header');
        }
    }
}
