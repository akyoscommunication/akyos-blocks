<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\DatePicker;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Range;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;

class testimonials2 extends Block
{
    public function __construct(
    ) {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("testimonials2")
            ->setTitle("TEMOIGNAGES | 2")
            ->setCategory("testimonial")
            ->setIcon("testimonial")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/testimonials2.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Témoignages"),
            Repeater::make("Témoignages", "testimonials")
                ->fields([
                    Image::make("Photo", "photo")
                        ->format('id')
                        ->column(10),
                    Text::make("Nom & Prénom", "name")
                        ->column(15),
                    Text::make("Fonction", "job")
                        ->column(15),
                    DatePicker::make("Date", "date")
                        ->column(10),
                    Range::make("Note", "rating")
                        ->min(0)
                        ->max(5)
                        ->column(10),
                    Wysiwyg::make("Témoignage", "content"),
                ])
                ->collapsed("name")
                ->button("Ajouter un témoignage"),
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        if (file_exists(get_template_directory() . '/resources/views/blocks/testimonials2.blade.php')) {
            return view('blocks.testimonials2');
        } else {
            return view('akyos-blocks::blocks.testimonials2');
        }
    }
}
