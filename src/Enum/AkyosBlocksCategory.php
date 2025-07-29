<?php

namespace Akyos\Blocks\Enum;

enum AkyosBlocksCategory: string
{
    case ACCORDION = 'accordion';
    case BLOG = 'blog';
    case HEADER = 'header';
    case LAYOUT = 'layout';
    case MAP = 'map';
    case NUMBERS = 'numbers';
    case QUOTE = 'quote';
    case SERVICES = 'services';
    case TEAM = 'team';
    case TESTIMONIAL = 'testimonial';
    case PARTNER = 'partner';
    case TIMELINE = 'timeline';

    /**
     * Retourne le titre associé à chaque catégorie
     */
    public function getTitle(): string
    {
        return match ($this) {
            self::ACCORDION => 'Accordéon',
            self::BLOG => 'Blog',
            self::HEADER => 'Entêtes',
            self::LAYOUT => 'Dispositions',
            self::MAP => 'Carte',
            self::NUMBERS => 'Chiffres clés',
            self::QUOTE => 'Citation',
            self::SERVICES => 'Services',
            self::TEAM => 'Équipe',
            self::TESTIMONIAL => 'Témoignages',
            self::PARTNER => 'Partenaires',
            self::TIMELINE => 'Timeline',
        };
    }

    /**
     * Retourne toutes les catégories sous forme de tableau pour WordPress
     */
    public static function getWordPressCategories(): array
    {
        $categories = [];

        foreach (self::cases() as $category) {
            $categories[] = [
                'slug' => $category->value,
                'title' => $category->getTitle()
            ];
        }

        return $categories;
    }
}
