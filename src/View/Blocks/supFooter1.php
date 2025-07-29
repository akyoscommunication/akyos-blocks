<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use Extended\ACF\Fields\Textarea;

class supFooter1 extends Block
{
    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName('sup-footer-1')
            ->setTitle("SUR-FOOTER | 1")
            ->setCategory("layout")
            ->setIcon("layout")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/sur-footer-1.jpg');
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
        return view('blocks.supFooter1');
    }
}
