<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\ColorPicker;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\TrueFalse;

class pricing3 extends Block
{
    public function __construct()
    {
        add_filter("acf/load_field/key=field_674811f1", function (array $field): array {

            if (wp_doing_ajax()) {
                $field['choices'] = self::ajax_get_choices('pricing3', 'list');
            }

            return $field;
        }, 10, 1);
    }

    public static function ajax_get_choices($blockName, $fieldName)
    {
        $choices = [];

        $blocks = parse_blocks(get_post($_POST['post_id'])->post_content);
        foreach ($blocks as $block) {
            if ($block['blockName'] === 'acf/' . $blockName) {
                $repeaterChoices = array_filter($block['attrs']['data'], function ($key) use ($fieldName) {
                    return !str_starts_with($key, '_') && str_starts_with($key, $fieldName . '_');
                }, ARRAY_FILTER_USE_KEY);
            }
        }

        if (isset($repeaterChoices)) {
            foreach ($repeaterChoices as $choice) {
                $choices[acf_slugify($choice)] = $choice;
            }
        }

        return $choices;
    }


    /**
     * Fonctionnement : On ajoute des lignes dans le repeater "Fonctionnalités", on save le post
     * Et les fonctionnalités apparaîtront pour chaque offre
     */

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("pricing3")
            ->setTitle("PRIX | 3")
            ->setCategory("price")
            ->setIcon("money-alt")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/pricing3.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Prix"),
            Repeater::make("Fonctionnalités", "list")
                ->fields([
                    Text::make("Élément", "item")
                ])
                ->helperText('Vous devez sauvegarder la page pour voir les fonctionnalités dans les prix')
                ->button('Ajouter une fonctionnalité'),
            Repeater::make("Prix", "prices")
                ->fields([
                    Text::make("Titre", "title")->column(30),
                    Textarea::make("Description", "description")
                        ->newLines("br")
                        ->column(50),
                    ColorPicker::make("Couleur", "color")->column(20),
                    Text::make("Prix", "price")->column(30),
                    Text::make("Période", "period")->column(15)->prefix("par"),
                    TrueFalse::make("Populaire", "popular")->column(15),
                    Button::make("Bouton", "button")->column(40),
                    Select::make("Fonctionnalités incluses", "functionalities")
                        ->choices([])
                        ->multiple()
                        ->lazyLoad()
                ])
                ->collapsed('title')
                ->button('Ajouter un prix')
                ->layout('block'),
        ];
    }

    public function data()
    {
        return parent::data();
    }

    public function render()
    {
        if (file_exists(get_template_directory() . '/resources/views/blocks/pricing3.blade.php')) {
            return view('blocks.pricing3');
        } else {
            return view('akyos-blocks::blocks.pricing3');
        }
    }
}
