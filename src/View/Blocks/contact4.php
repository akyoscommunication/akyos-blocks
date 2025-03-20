<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\PostObject;
use Extended\ACF\Fields\TrueFalse;

class contact4 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("contact4")
            ->setTitle("CONTACT | 4")
            ->setCategory("form")
            ->setIcon("email")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/contact4.jpg');
    }

    protected static function fields(): array
    {
        return [
            Title::make('Titre', 'title'),
            TrueFalse::make("Afficher les réseaux sociaux", "socials")
                ->stylized()
                ->column(25),
            TrueFalse::make("Afficher le téléphone", "phone")
                ->stylized()
                ->column(25),
            TrueFalse::make("Afficher l'adresse", "address")
                ->stylized()
                ->column(25),
            TrueFalse::make("Afficher l'email", "email")
                ->stylized()
                ->column(25),
            PostObject::make('Formulaire', 'form')->postTypes(['forminator_forms'])->format('id'),
            Image::make('Image', 'image')->format('id')
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('blocks.contact4');
    }
}
