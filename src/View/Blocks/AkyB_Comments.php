<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Blocks\Acf\Fields\AkyB_Button;
use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\DatePicker;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Range;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\WysiwygEditor;

class AkyB_Comments extends Block
{

    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("akyb-comments")
            ->setTitle("AKYB Commentaires")
            ->setCategory("content")
            ->setIcon("admin-comments");
    }

    protected static function fields(): array
    {
        return [
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '1' => 'Style 1',
                    '2' => 'Style 2',
                    '3' => 'Style 3',
                    '4' => 'Style 4',
                ])->layout('vertical')->default('1'),
            Title::make('Titre', 'title'),
            WysiwygEditor::make("Petit Texte", "text"),
            AkyB_Button::make("Bouton", "button"),
            Repeater::make("Commentaires", "comments")
                ->fields([
                    Text::make("Nom", "name"),
                    Image::make("Photo", "photo")->Format("id"),
                    Textarea::make("Description", "description"),
                    Text::make("Métier", "job"),
                    Range::make('étoiles', 'etoiles')->min(0)->max(5)->step(1),
                    DatePicker::make('Date', 'date'),
                ])->layout('block')->collapsed('name')
        ];
    }

    public function render()
    {
        return view('akyos-blocks::blocks.comments.comment');
    }
}
