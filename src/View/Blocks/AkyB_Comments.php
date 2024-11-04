<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Blocks\Acf\Fields\AkyB_Button;
use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Title;
use Extended\ACF\Fields\Message;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\WysiwygEditor;

class AkyB_Comments extends Block
{

    public function __construct(
    )
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
                    '1' => 'Style 1 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/comments-style-1.png" alt="Style 1" />',
                    '2' => 'Style 2 : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/comments-style-2.png" alt="Style 2" />',
                    '3' => 'Style 3  : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/comments-style-3.png" alt="Style 3" />',
                    '4' => 'Style 4  : <img style="max-width:300px;" src="' . get_template_directory_uri() . '/resources/assets/images/comments-style-4.png" alt="Style 4" />',
                ])->layout('vertical')->default('1'),
            Title::make('Titre', 'title'),
            WysiwygEditor::make("Petit Texte", "text"),
            AkyB_Button::make("Bouton", "button"),
            Message::make(("Note : Les commentaires sont automatiquement affichés"), "note"),
        ];
    }

    public function render()
    {
        return view('blocks.comments.comment');
    }
}
