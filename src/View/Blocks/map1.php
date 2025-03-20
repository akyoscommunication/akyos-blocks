<?php

namespace App\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;

/**
 * Class map1
 * @package App\View\Blocks
 *
 ************************** DEPENDANCES :
 ************************* - Map.js
 ************************* - marker.png
 */

class map1 extends Block
{

    public $markers = [];

    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("map1")
            ->setTitle("CARTE | 1")
            ->setCategory("map")
            ->setIcon("location")
            ->setPreviewImage(get_template_directory_uri() . '/resources/assets/images/previews/map1.jpg');
    }

    protected static function fields(): array
    {
        return [
            Tab::make("Contenu"),
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Tab::make("Carte"),
            Repeater::make("Marqueurs", "locations")
                ->fields([
                    Wysiwyg::make("Contenu", "content")->column(66),
                    Text::make("Latitude", "latitude")->column(16),
                    Text::make("Longitude", "longitude")->column(16),
                ])
        ];
    }

    public function data()
    {
        parent::data();
        foreach (get_field("locations") as $location) {
            $this->markers[] = [
                'lat' => $location['latitude'],
                'lng' => $location['longitude'],
                'content' => $location['content']
            ];
        }
    }

    public function render()
    {
        return view('blocks.map1');
    }
}
