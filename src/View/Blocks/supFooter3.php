<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use Extended\ACF\Fields\Textarea;

class supFooter3 extends Block
{
    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName('sup-footer-3')
            ->setTitle("SUR-FOOTER | 3")
            ->setCategory("layout")
            ->setIcon("layout")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/sur-footer-3.jpg');
    }

    protected static function fields(): array
    {
        return [
            Textarea::make('Titre', 'title')->newLines('br')->column(50),
            Button::make('Bouton', 'button')->column(50)
        ];
    }

    public function render()
    {
        return view('akyos-blocks::blocks.supFooter3');
    }
}
