<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Blocks\Acf\Fields\AkyB_Form1;
use Akyos\Blocks\Acf\Fields\AkyB_Form2;
use Akyos\Blocks\Acf\Fields\AkyB_Form3;
use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\RadioButton;

class AkyB_Form extends Block
{


    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("akyb-form")
            ->setTitle("AKYB Formulaire")
            ->setCategory("form")
            ->setIcon("admin-comments")
            ;
    }

    protected static function fields(): array
    {
        return [
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '1' => 'Style 1',
                    '2' => 'Style 2',
                    '3' => 'Style 3',
                ])->default('1'),
            AkyB_Form1::make('Formulaire', 'form1')
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '1')
                ]),
            AkyB_Form2::make('Formulaire', 'form2')
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '2')
                ]),
            AkyB_Form3::make('Formulaire', 'form3')
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '3')
                ]),
        ];
    }

    public function render()
    {
        return view('akyos-blocks::blocks.forms.form');
    }
}
