<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Email;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;

class team6 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("team6")
            ->setTitle("EQUIPE | 6")
            ->setCategory("team")
            ->setIcon("groups")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/team6.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Membres"),
            Repeater::make("Membres", "members")
                ->fields([
                    Image::make("Photo", "photo")
                        ->format('id')->column(10),
                    Text::make("Nom", "name")->column(15),
                    Text::make("Fonction", "job")->column(15),
                    Text::make("Téléphone", "phone")->column(15),
                    Email::make("Email", "email")->column(10),
                    Repeater::make("Réseaux", "socials")
                        ->fields([
                            Select::make("Réseau", "network")
                                ->choices([
                                    'facebook' => 'Facebook',
                                    'twitter' => 'Twitter',
                                    'linkedin' => 'Linkedin',
                                    'instagram' => 'Instagram',
                                    'youtube' => 'Youtube',
                                ])
                                ->column(33),
                            Text::make("Lien", "link")->column(15),
                        ])
                ])
                ->collapsed('name')
                ->button("Ajouter un membre"),
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('blocks.team6');
    }
}
