<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\Acf\Fields\Button;
use App\Acf\Fields\Title;
use App\Acf\Fields\Wysiwyg;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\Select;

class lastsPosts4 extends Block
{
    public $posts;
    public $taxonomy;
    public function __construct()
    {
    }

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("lasts-posts4")
            ->setTitle("DERNIERS POSTS | 4")
            ->setCategory("post")
            ->setIcon("admin-post")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/lastsposts4.jpg');
    }

    protected static function fields(): array
    {
        $postsTypes = get_post_types(['public' => true], 'objects');

        return [
            Title::make('Titre', 'title'),
            Wysiwyg::make('Description', 'description'),
            Button::make("Bouton", "button"),
            Select::make('Type de post', 'post_type')
                ->choices(
                    collect($postsTypes)->mapWithKeys(function ($postType) {
                        return [$postType->name => $postType->label];
                    })->toArray()
                )
                ->default('post'),
            Number::make('Nombre de posts à afficher', 'number')
                ->default(4),
        ];
    }

    public function data()
    {
        $this->posts = get_posts([
            'post_type' => get_field('post_type'),
            'posts_per_page' => get_field('number'),
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        $taxonomies = get_object_taxonomies(get_field('post_type'));
        $this->taxonomy = array_shift($taxonomies);
        return parent::data();
    }

    public function render()
    {
        return view('akyos-blocks::blocks.lasts-posts4');
    }
}
