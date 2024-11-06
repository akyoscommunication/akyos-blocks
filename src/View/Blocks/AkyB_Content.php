<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Blocks\Acf\Fields\AkyB_Content1;
use Akyos\Blocks\Acf\Fields\AkyB_Content13;
use Akyos\Blocks\Acf\Fields\AkyB_Content14;
use Akyos\Blocks\Acf\Fields\AkyB_Content15;
use Akyos\Blocks\Acf\Fields\AkyB_Content3;
use Akyos\Blocks\Acf\Fields\AkyB_Content4;
use Akyos\Blocks\Acf\Fields\AkyB_Content5;
use Akyos\Blocks\Acf\Fields\AkyB_Content6to7;
use Akyos\Blocks\Acf\Fields\AkyB_Content8;
use Akyos\Blocks\Acf\Fields\AkyB_Content9;
use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Tab;

class AkyB_Content extends Block
{
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("akyb-content")
            ->setTitle(" AKYB Bloc de contenu")
            ->setCategory("content")
            ->setIcon("align-pull-left");
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '1-1' => 'Style 1-1',
                    '1-2' => 'Style 1-2',
                    '1-3' => 'Style 1-3',
                    '1-4' => 'Style 1-4',
                    '3' => 'Style 3',
                    '4' => 'Style 4',
                    '5' => 'Style 5',
                    '6' => 'Style 6',
                    '7' => 'Style 7',
                    '8' => 'Style 8',
                    '9' => 'Style 9',
                    '13' => 'Style 13',
                    '14' => 'Style 14',
                    '15' => 'Style 15',
                ])->default('1-1'),

            AkyB_Content1::make("Contenu 1", "content1to2")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '1-1'),
                    ConditionalLogic::where('style', '==', '1-2'),
                    ConditionalLogic::where('style', '==', '1-3'),
                    ConditionalLogic::where('style', '==', '1-4')
                ]),
            AkyB_Content3::make("Contenu 3", "content3")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '3')
                ]),
            AkyB_Content4::make("Contenu 4", "content4")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '4')
                ]),
            AkyB_Content5::make("Contenu 5", "content5")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '5')
                ]),
            AkyB_Content6to7::make("Contenu 6 à 7", "content6to7")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '6'),
                    ConditionalLogic::where('style', '==', '7')
                ]),
            AkyB_Content8::make("Contenu 8", "content8")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '8')
                ]),
            AkyB_Content9::make("Contenu 9", "content9")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '9')
                ]),
            AkyB_Content13::make("Contenu 13", "content13")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '13')
                ]),
            AkyB_Content14::make("Contenu 14", "content14")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '14')
                ]),
            AkyB_Content15::make("Contenu 15", "content15")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '15')
                ]),
        ];
    }

    public function render()
    {
        return view('akyos-blocks::blocks.contents.content');
    }
}
