# Système de Layouts Akyos Blocks

## Vue d'ensemble

Le système de layouts permet de gérer dynamiquement le contenu des sections header et footer via des blocs Gutenberg, tout en préservant la possibilité de personnaliser ces sections.

## Fonctionnement

### 1. Directive Blade `@layout`

Une directive Blade personnalisée `@layout()` fait directement le traitement des layouts :

```blade
{{-- Dans sections/header.blade.php --}}
@layout('header')

{{-- Votre contenu personnalisé ici --}}
<header class="custom-header">
    {{-- Contenu personnalisé --}}
</header>
```

```blade
{{-- Dans sections/footer.blade.php --}}
@layout('sub-footer')
@layout('footer')

{{-- Votre contenu personnalisé ici --}}
<footer class="custom-footer">
    {{-- Contenu personnalisé --}}
</footer>
```

### 2. Traitement Direct

La directive `@layout()` fait directement :
- Requête des posts de type `aky_layout`
- Filtrage par localisation
- Rendu des blocs Gutenberg
- Reset des données de post

### 3. Post Type `aky_layout`

Les layouts sont gérés via le post type `aky_layout` avec un champ ACF `location` pour définir leur position.

## Avantages de cette approche

1. **Performance** : Traitement direct sans passer par une fonction intermédiaire
2. **Simplicité** : Plus besoin de Composer complexe
3. **Flexible** : Permet d'ajouter du contenu personnalisé avant/après les layouts
4. **Maintenable** : Code propre et bien documenté
5. **Évolutif** : Facile d'ajouter de nouvelles fonctionnalités

## Utilisation

### Dans une section personnalisée

```blade
{{-- sections/header.blade.php --}}
@layout('header')

<div class="custom-header-content">
    <nav class="custom-navigation">
        {{-- Navigation personnalisée --}}
    </nav>
</div>
```

### Ajout de nouvelles localisations

Pour ajouter une nouvelle localisation (ex: `sidebar`), il suffit de :

1. Ajouter l'option dans le champ ACF `location`
2. Utiliser `@layout('sidebar')` dans la vue souhaitée

## Architecture Technique

### Directive Blade
```php
@layout('header')
```

Se transforme en :
```php
<?php 
    $post = new \WP_Query([
        'post_type' => 'aky_layout'
    ]);
    
    $layout = trim('header', '\'"');
    
    if ($post->have_posts()) {
        while ($post->have_posts()) {
            $post->the_post();
            if (get_field('location') === $layout) {
                foreach (parse_blocks(get_the_content()) as $block) {
                    echo render_block($block);
                }
            }
        }
        wp_reset_postdata();
    }
?>
```

## Migration

Cette nouvelle approche est rétrocompatible. Les anciennes sections utilisant `{!! $layout("header") !!}` peuvent être migrées vers `@layout('header')` pour une meilleure performance. 