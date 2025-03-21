<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use App\View\Composers\App;
use Extended\ACF\Fields\Message;

class blog6 extends Block
{
    public $posts;
    public $pagination;
    public $maxPages;
    public $postsByTerm;

    protected static function block(): GutenbergBlock
    {
        return (new GutenbergBlock())
            ->setName("blog6")
            ->setTitle("BLOG | 6")
            ->setCategory("blog")
            ->setIcon("editor-table")
            ->setPreviewImage(get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/blog6.jpg');
    }

    protected static function fields(): array
    {
        return [
            Message::make('Ce bloc affiche les actualités.', 'info'),
        ];
    }

    public function data()
    {
        parent::data();

        $query = new \WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        $this->posts = $query->posts;
        $this->pagination = App::getPagination($query);
        $this->maxPages = $query->max_num_pages;
        $this->postsByTerm = $this->getPostsByTerm();
    }

    private function getPostsByTerm()
    {
        $terms = get_terms([
            'taxonomy' => 'category',
            'hide_empty' => false,
        ]);

        $postsByTerm = [];
        foreach ($terms as $term) {
            $query = new \WP_Query([
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'tax_query' => [
                    [
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $term->slug,
                    ],
                ],
            ]);
            $postsByTerm[$term->slug] = $query->post_count;
        }
        return $postsByTerm;
    }

    public function render()
    {
        return view('akyos-blocks::blocks.blog6');
    }
}
