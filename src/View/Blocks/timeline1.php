<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\WYSIWYGEditor;

class timeline1 extends Block
{
    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("timeline1")
            ->setTitle("TIMELINE | 1")
            ->setCategory("timeline")
            ->setIcon("hourglass")
            ->setPreviewImage(get_template_directory_uri().'/vendor/akyos/akyos-blocks/resources/assets/previews/timeline1.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            WYSIWYGEditor::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make('Étapes'),
            Repeater::make('Étapes', 'steps')
                ->fields([
                    Text::make('Numéro', 'number')->column(20),
                    Text::make('Titre', 'title')->column(25),
                    Textarea::make('Description', 'description')->column(55),
                ])
                ->collapsed('title')
                ->button('Ajouter une étape'),
        ];
    }

    public function render()
    {
        return view('akyos-blocks::blocks.timeline1');
    }
}
