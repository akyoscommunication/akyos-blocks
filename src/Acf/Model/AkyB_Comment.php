<?php

namespace App\Model;

use Akyos\Core\Wrappers\QueryBuilder;

class AkyB_Comment
{

    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return get_the_title($this->id);
    }
    public function getDate(): string
    {
        return get_the_date('d/m/Y', $this->id);
    }

    public function getLink(): string
    {
        return get_permalink($this->id);
    }

    public function getThumbnail(): string
    {
        return get_post_thumbnail_id($this->id) ?: 'https://picsum.photos/seed/picsum/200/300';
    }

    public function getDescription(): string
    {
        return get_field('description', $this->id);
    }
    public function getNom(): string
    {
        return get_field('name', $this->id);
    }
    public function getJob(): string
    {
        return get_field('job', $this->id);
    }
    public function getPhoto(): string
    {
        return get_field('photo', $this->id) ?: 'https://picsum.photos/seed/picsum/200/300';
    }

    public function getStar(): int
    {
        return get_field('etoiles', $this->id);
    }


}
