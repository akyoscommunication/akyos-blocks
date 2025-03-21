# Akyos Blocks

Akyos Blocks est un package conçu pour être utilisé avec le thème Sage de Roots.io. Ce package fournit une collection de blocs personnalisés pour l'éditeur Gutenberg de WordPress, permettant de créer des sites web dynamiques et visuellement attrayants.

## Installation

Pour installer ce package, utilisez Composer :

```bash
composer require akyos/akyos-blocks
```

## Prérequis

- WordPress
- Thème Sage de Roots.io
- Advanced Custom Fields Pro (ACF Pro)

## Fonctionnalités

- **Blocs Gutenberg personnalisés** : Une large gamme de blocs prêts à l'emploi, tels que des sliders, timelines, témoignages, cartes interactives, sections de contenu, etc.
- **Intégration ACF** : Utilisation d'Advanced Custom Fields pour personnaliser les blocs directement depuis l'interface d'administration WordPress.
- **Composants interactifs** : Intégration de bibliothèques comme Swiper.js, GSAP, ScrollTrigger et Leaflet.js pour des fonctionnalités interactives avancées.
- **Prise en charge des aperçus** : Chaque bloc inclut une image d'aperçu pour une identification facile dans l'éditeur Gutenberg.
- **Layouts personnalisés** : Gestion des dispositions comme les headers et footers via des localisations spécifiques.

## Structure du projet

- `resources/assets/` : Contient les fichiers CSS et JavaScript pour les blocs.
  - `css/blocks/` : Styles spécifiques pour chaque bloc.
  - `js/components/` : Composants JavaScript pour les fonctionnalités interactives (e.g., sliders, timelines, cartes).
- `resources/previews/` : Images d'aperçu des blocs pour l'éditeur Gutenberg.
- `resources/views/blocks/` : Templates Blade pour le rendu des blocs.
- `src/` : Contient les classes PHP principales, y compris :
  - `AkyosBlocksLoader.php` : Chargeur principal des blocs et des layouts.
  - `View/Blocks/` : Définitions des blocs Gutenberg avec leurs champs et leurs templates associés.
- `vendor/` : Dépendances gérées par Composer.

## Utilisation

1. Installez le package via Composer.
2. Assurez-vous que le thème Sage est configuré pour charger les blocs personnalisés.
3. Activez les blocs souhaités dans l'éditeur Gutenberg.
4. Configurez les champs ACF pour chaque bloc selon vos besoins.

## Développement

Pour modifier ou ajouter des blocs :

1. Ajoutez ou modifiez les fichiers dans `resources/views/blocks/` pour les templates Blade.
2. Ajoutez les styles correspondants dans `resources/assets/css/blocks/`.
3. Ajoutez les scripts interactifs dans `resources/assets/js/components/`.
4. Déclarez les nouveaux blocs dans `src/View/Blocks/` en suivant la structure des classes existantes.
5. Ajoutez les dépendances nécessaires dans `composer.json` ou `package.json` si applicable.

### Exemple de création d'un bloc

1. Créez une nouvelle classe dans `src/View/Blocks/`.
2. Définissez les champs ACF nécessaires dans la méthode `fields()`.
3. Ajoutez un template Blade correspondant dans `resources/views/blocks/`.
4. Ajoutez une image d'aperçu dans `resources/previews/`.

### Dépendances JavaScript

Certaines fonctionnalités interactives nécessitent des bibliothèques tierces :

- **Swiper.js** : Utilisé pour les sliders.
- **GSAP et ScrollTrigger** : Utilisés pour les animations des timelines.
- **Leaflet.js** : Utilisé pour les cartes interactives.

Ces dépendances sont automatiquement gérées et incluses dans le projet.

## AkyosBlocksLoader

La classe `AkyosBlocksLoader` est le cœur du package Akyos Blocks. Elle gère l'initialisation et le chargement des blocs, des layouts, et des assets nécessaires. Voici un aperçu de ses principales responsabilités :

### Fonctionnalités principales

1. **Vérification des prérequis** :
   - Vérifie la présence du fichier `akyos-blocks.json` dans le répertoire du thème. Ce fichier contient la configuration des blocs à charger.

2. **Chargement des layouts** :
   - Enregistre un type de contenu personnalisé `aky_layout` pour gérer les dispositions (layouts) comme les headers, footers, et sur-footers.
   - Ajoute un groupe de champs ACF pour définir la localisation des layouts (e.g., header, footer).
   - Fournit une directive Blade `@layoutLocation` pour afficher dynamiquement les layouts dans les templates.

3. **Chargement des blocs** :
   - Parcourt la configuration des blocs définie dans `akyos-blocks.json`.
   - Charge dynamiquement chaque bloc en appelant sa méthode `registerGutenberg`.
   - Ajoute un namespace `akyos-blocks` pour les templates Blade des blocs.

4. **Gestion des assets** :
   - Copie les fichiers CSS nécessaires pour chaque bloc dans le répertoire du thème.
   - Ajoute les dépendances JavaScript requises (e.g., Swiper.js, Leaflet.js) dans le fichier `package.json` du thème.

### Exemple d'utilisation

La classe `AkyosBlocksLoader` est instanciée et utilisée comme suit :

```php
$loader = new \Akyos\Blocks\AkyosBlocksLoader();
$loader->load();
```

Cela permet de charger automatiquement tous les blocs, layouts et assets définis dans le package.

## Exemple de fichier `akyos-blocks.json`

Pour importer des blocs dans votre thème WordPress Sage, vous devez créer un fichier `akyos-blocks.json` dans le répertoire de votre thème. Voici un exemple de configuration :

```json
{
  "hero": "hero1",
  "map": "map1",
  "blog": "blog1"
}
```


## Contribution

Les contributions sont les bienvenues ! Veuillez soumettre une pull request ou signaler un problème via le dépôt GitHub.

## Licence

Ce projet est sous licence MIT. Consultez le fichier LICENSE pour plus d'informations.