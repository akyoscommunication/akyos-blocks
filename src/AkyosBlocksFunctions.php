<?php

namespace Akyos\Blocks;


use App\Acf\Fields\Button;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Location;

class AkyosBlocksFunctions
{
    public const THEME_OPTION = 'akyos-blocks-option';


    public function load(): void
    {
        $this->addOptionsPage();
    }


    public function addOptionsPage(): void
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page([
                'icon_url' => 'dashicons-star-filled',
                'menu_slug' => self::THEME_OPTION,
                'page_title' => 'Options Akyos Blocks',
                'position' => 22,
            ]);
        }

        if (function_exists('register_extended_field_group')) {
            register_extended_field_group([
                'title' => 'Options Akyos Blocks',
                'style' => 'seamless',
                'fields' => [
                    Tab::make('En-tête'),
                    RadioButton::make('Style du Header', 'header_style')
                        ->choices([
                            '1' => 'Style 1',
                            '2' => 'Style 2',
                            '3' => 'Style 3',
                            '4' => 'Style 4',
                        ])->default('1'),
                    RadioButton::make("Style de la Top Bar", 'header_topbar_style')
                        ->choices([
                            null => 'Sans top bar',
                            '1' => 'Top bar 1 ',
                            '2' => 'Top bar 2',
                            '3' => 'Top bar 3 ',
                        ])->default(null),

                    Tab::make('Pied de site'),
                    RadioButton::make('Style du footer', 'footer_style')
                        ->choices([
                            '1' => 'Style 1',
                            '2' => 'Style 2',
                            '3' => 'Style 3',
                            '4' => 'Style 4',
                        ])->default('1'),
                    Text::make("Texte footer", 'footer_text'),
                    RadioButton::make("Style de l'option", 'footer_option_style')
                        ->choices([
                            '1' => 'Sans option',
                            '2' => 'Option 1',
                            '3' => 'Option 2',
                            '4' => 'Option 3',
                        ])->default('1'),
                    Text::make("Texte option footer", 'footer_option_text')
                        ->ConditionalLogic([
                            ConditionalLogic::where('footer_option_style', '!=', '1')
                        ]),
                    Button::make('Bouton footer option', 'footer_option_button')
                        ->ConditionalLogic([
                            ConditionalLogic::where('footer_option_style', '!=', '1')
                        ]),

                ],
                'location' => [
                    Location::where('options_page', '===', self::THEME_OPTION),
                ],
            ]);
        }
    }
}
