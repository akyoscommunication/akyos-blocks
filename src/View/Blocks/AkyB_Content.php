<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Blocks\Acf\Fields\Content1;
use Akyos\Blocks\Acf\Fields\Content3;
use Akyos\Blocks\Acf\Fields\Content4;
use Akyos\Blocks\Acf\Fields\Content5;
use Akyos\Blocks\Acf\Fields\Content6to7;
use Akyos\Blocks\Acf\Fields\Content8;
use Akyos\Blocks\Acf\Fields\Content9;
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
            ->setName("akyb_content")
            ->setTitle("Bloc de contenu")
            ->setCategory("content")
            ->setIcon("align-pull-left");
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '1-1' => 'Style 1-1 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-1-1.png" alt="Style 1-1" />',
                    '1-2' => 'Style 1-2 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-1-2.png" alt="Style 1-2" />',
                    '1-3' => 'Style 1-3 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-1-3.png" alt="Style 1-3" />',
                    '1-4' => 'Style 1-4 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-1-4.png" alt="Style 1-4" />',
                    '3' => 'Style 3 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-3.png" alt="Style 3" />',
                    '4' => 'Style 4 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-4.png" alt="Style 4" />',
                    '5' => 'Style 5 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-5.png" alt="Style 5" />',
                    '6' => 'Style 6 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-6.png" alt="Style 6" />',
                    '7' => 'Style 7 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-7.png" alt="Style 7" />',
                    '8' => 'Style 8 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-8.png" alt="Style 8" />',
                    '9' => 'Style 9 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/content-style-9.png" alt="Style 9" />',
                ])->default('1-1'),

            Content1::make("Contenu 1", "content1to2")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '1-1'),
                    ConditionalLogic::where('style', '==', '1-2'),
                    ConditionalLogic::where('style', '==', '1-3'),
                    ConditionalLogic::where('style', '==', '1-4')
                ]),
            Content3::make("Contenu 3", "content3")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '3')
                ]),
            Content4::make("Contenu 4", "content4")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '4')
                ]),
            Content5::make("Contenu 5", "content5")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '5')
                ]),
            Content6to7::make("Contenu 6 à 7", "content6to7")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '6'),
                    ConditionalLogic::where('style', '==', '7')
                ]),
            Content8::make("Contenu 8", "content8")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '8')
                ]),
            Content9::make("Contenu 9", "content9")
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '9')
                ]),
        ];
    }

    public function render()
    {
        return view('blocks.contents.content');
    }
}
