<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Layout extends Composer
{
    protected static $views = [
        'sections.header',
        'sections.footer'
    ];

    public function with()
    {
        return [
            'layout' => $this->getLayout(...)
        ];
    }


    public function getLayout($layout)
    {
        $post = new \WP_Query([
            'post_type' => 'aky_layout'
        ]);

        $layout = trim($layout, '\'"');

        if ($post->have_posts()) {
            while ($post->have_posts()) {
                $post->the_post();
                if (get_field('location') === $layout) {
                    foreach (parse_blocks(get_the_content()) as $block) {
                        echo render_block($block);
                    }
                }
            }
        }
    }
}
