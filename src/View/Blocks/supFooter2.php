<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use Extended\ACF\Fields\Textarea;

class supFooter2 extends Block
{
    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName('sup-footer-2')
            ->setTitle("SUR-FOOTER | 2")
            ->setCategory("layout")
            ->setIcon("layout")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/sur-footer-2.jpg');
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
        if (file_exists(get_template_directory() . '/resources/views/blocks/supFooter2.blade.php')) {
            return view('blocks.supFooter2');
        } else {
            return view('akyos-blocks::blocks.supFooter2');
        }
    }
}
