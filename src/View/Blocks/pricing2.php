<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\ColorPicker;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\TrueFalse;

class pricing2 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("pricing2")
            ->setTitle("PRIX | 2")
            ->setCategory("price")
            ->setIcon("money-alt")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/pricing1.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Prix"),
            Repeater::make("Prix", "prices")
                ->fields([
                    Text::make("Titre", "title")->column(30),
                    Textarea::make("Description", "description")
                        ->newLines("br")
                        ->column(50),
                    ColorPicker::make("Couleur", "color")->column(20),
                    Text::make("Prix", "price")->column(30),
                    Text::make("Période", "period")->column(15)->prefix("par"),
                    TrueFalse::make("Populaire", "popular")->column(15),
                    Button::make("Bouton", "button")->column(40),
                    Repeater::make("Liste", "list")
                        ->fields([
                            Text::make("Élément", "item")
                        ])
                        ->button('Ajouter un élément'),
                ])
                ->collapsed('title')
                ->button('Ajouter un prix')
                ->layout('block')
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        return view('blocks.pricing2');
    }
}
