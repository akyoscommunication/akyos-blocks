<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\PostObject;
use Extended\ACF\Fields\TrueFalse;

class contact5 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("contact5")
            ->setTitle("CONTACT | 5")
            ->setCategory("form")
            ->setIcon("email")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/contact5.jpg');
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
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('akyos-blocks::blocks.contact5');
    }
}
