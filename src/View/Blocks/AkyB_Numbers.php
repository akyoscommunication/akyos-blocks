<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\CustomFields\StyleSelector\StyleSelectorField;
use App\Acf\Fields\Numbers1;
use App\Acf\Fields\Numbers2;
use App\Acf\Fields\Title;
use App\Acf\Fields\Button;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;

class AkyB_Numbers extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("akyb_numbers")
            ->setTitle("Liste de nombre")
            ->setCategory("content")
            ->setIcon("editor-ol");
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '1' => 'Style 1 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/numbers-style-1.png" alt="Style 1" />',
                    '2-1' => 'Style 2-1 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/numbers-style-2-1.png" alt="Style 2-1" />',
                    '2-2' => 'Style 2-2 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/numbers-style-2-2.png" alt="Style 2-2" />',
                ])->default('1'),
            Numbers1::make('Nombre', 'number1')
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '1'),
                ]),
            Numbers2::make('Nombre', 'number2')
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '2-1'),
                    ConditionalLogic::where('style', '==', '2-2'),
                ]),

        ];
    }

    public function render()
    {
        return $this->view("blocks.numbers.number");
    }
}
