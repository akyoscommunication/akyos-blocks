<?php

namespace Akyos\Blocks\Catalog;

class Catalog
{
    private static $instance = null;

    private function __construct()
    {
        $this->init();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function init()
    {
        add_action('admin_menu', [$this, 'addAdminMenu']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
        add_action('wp_ajax_akyos_add_blocks_to_theme', [$this, 'handleAddBlocksToTheme']);
    }

    public function addAdminMenu()
    {
        add_management_page(
            'Catalogue de blocs', // Page title
            'Catalogue de blocs', // Menu title
            'manage_options', // Capability
            'akyos-blocks-catalog', // Menu slug
            [$this, 'renderAdminPage'] // Callback function
        );
    }

    public static function enqueueAdminAssets(string $hook): void
    {
        if ($hook !== 'tools_page_akyos-blocks-catalog') {
            return;
        }
        wp_enqueue_style('akyos-blocks-catalog', get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/admin/catalog.css');
    }

    public function renderAdminPage()
    {
        $blocks = $this->getBlocks();
        $categories = $this->getCategories();

        echo \Roots\view('akyos-blocks::admin.catalog', [
            'blocks' => $blocks,
            'categories' => $categories,
            'nonce' => wp_create_nonce('akyos_add_blocks_to_theme_nonce'),
            'ajax_url' => admin_url('admin-ajax.php')
        ])->render();
    }

    private function getBlocks()
    {
        $blocks = [];
        $blocksDir = __DIR__ . '/../View/Blocks';

        if (is_dir($blocksDir)) {
            $blockFiles = scandir($blocksDir);

            foreach ($blockFiles as $file) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                // On ne prend que les fichiers PHP (un bloc = une classe PHP)
                if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
                    continue;
                }
                $blockName = pathinfo($file, PATHINFO_FILENAME);
                $blocks[] = [
                    'name' => $blockName,
                    'category' => $this->getBlockCategory($blockName),
                    'preview' => $this->getBlockPreview($blockName),
                ];
            }
        }

        return $blocks;
    }

    // une fonction qui enlève tous les chiffres d'un string
    private function removeNumbers($string)
    {
        return preg_replace('/\d+/', '', $string);
    }

    private function getCategories()
    {
        $categories = [];
        $blocksDir = __DIR__ . '/../View/Blocks';

        if (is_dir($blocksDir)) {
            try {
                $blockFiles = scandir($blocksDir);
                foreach ($blockFiles as $file) {
                    if ($file === '.' || $file === '..') {
                        continue;
                    }
                    // On ne prend que les fichiers PHP (un bloc = une classe PHP)
                    if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
                        continue;
                    }
                    $blockName = pathinfo($file, PATHINFO_FILENAME);
                    $category = $this->getBlockCategory($blockName);
                    if (!in_array($category, $categories)) {
                        $categories[] = $category;
                    }
                }
            } catch (\Exception $e) {
                // En cas d'erreur, retourner un tableau vide
            }
        }

        return $categories;
    }

    private function getBlockDescription($blockName)
    {
        // Essayer de récupérer la description depuis la classe du bloc
        $className = 'Akyos\\Blocks\\View\\Blocks\\' . $blockName;
        if (class_exists($className)) {
            try {
                $block = new $className();
                if (method_exists($block, 'getDescription')) {
                    return $block->getDescription();
                }
            } catch (\Exception $e) {
                // Ignorer les erreurs
            }
        }

        // Description par défaut basée sur le nom du bloc
        return 'Bloc ' . ucfirst(str_replace(['_', '-'], ' ', $blockName));
    }

    private function getBlockCategory($blockName)
    {
        // Catégorie par défaut basée sur le nom du bloc
        if (strpos($blockName, 'accordion') !== false)
            return 'Accordéon';
        if (strpos($blockName, 'hero') !== false)
            return 'Hero';
        if (strpos($blockName, 'content') !== false)
            return 'Contenu';
        if (strpos($blockName, 'slider') !== false)
            return 'Slider';
        if (strpos($blockName, 'blog') !== false)
            return 'Blog';
        if (strpos($blockName, 'footer') !== false)
            return 'Footer';
        if (strpos($blockName, 'contact') !== false)
            return 'Contact';
        if (strpos($blockName, 'team') !== false)
            return 'Équipe';
        if (strpos($blockName, 'services') !== false)
            return 'Services';
        if (strpos($blockName, 'testimonials') !== false)
            return 'Témoignages';
        if (strpos($blockName, 'numbers') !== false)
            return 'Chiffres';
        if (strpos($blockName, 'timeline') !== false)
            return 'Timeline';
        if (strpos($blockName, 'map') !== false)
            return 'Carte';
        if (strpos($blockName, 'partners') !== false)
            return 'Partenaires';
        if (strpos($blockName, 'quote') !== false)
            return 'Citation';
        if (strpos($blockName, 'single') !== false)
            return 'Article';
        if (strpos($blockName, 'supFooter') !== false)
            return 'Sur-footer';
        if (strpos($blockName, 'pricing') !== false)
            return 'Prix';
        if (strpos($blockName, 'lastsPosts') !== false)
            return 'Derniers articles';
        if (strpos($blockName, 'posts') !== false)
            return 'Articles';
        if (strpos($blockName, 'header') !== false)
            return 'Header';
        if (strpos($blockName, 'footer') !== false)
            return 'Footer';
        if (strpos($blockName, 'contact') !== false)
            return 'Contact';
        if (strpos($blockName, 'team') !== false)

            return 'Autre';
    }

    private function getBlockPreview($blockName)
    {
        $previewPath = get_template_directory_uri() . '/vendor/akyos/akyos-blocks/resources/assets/previews/' . $blockName . '.jpg';
        return file_exists(str_replace(get_template_directory_uri(), get_template_directory(), $previewPath)) ? $previewPath : null;
    }

    public function handleAddBlocksToTheme()
    {

        // Vérifier le nonce pour la sécurité
        if (!wp_verify_nonce($_POST['nonce'] ?? '', 'akyos_add_blocks_to_theme_nonce')) {
            wp_send_json_error('Nonce invalide');
        }

        $blocks = explode(',', $_POST['blocks'] ?? '');

        if (empty($blocks)) {
            wp_send_json_error('Aucun bloc à ajouter');
        }

        $themePath = get_template_directory();
        $blocksJsonPath = $themePath . '/akyos-blocks.json';

        $existingBlocks = [];


        // Vérifier si le fichier existe déjà
        if (file_exists($blocksJsonPath)) {
            $existingContent = file_get_contents($blocksJsonPath);
            $existingBlocks = json_decode($existingContent, true) ?: [];

            // Ajouter uniquement les blocs qui ne sont pas déjà présents
            $newBlocks = [];

            foreach ($blocks as $block) {
                $blockName = $block ?? '';
                if (!empty($blockName) && !in_array($blockName, $existingBlocks)) {
                    $newBlocks[] = $blockName;
                }
            }

            // Fusionner les blocs existants avec les nouveaux
            $allBlocks = array_merge($existingBlocks, $newBlocks);

            // Écrire le fichier JSON
            $jsonContent = json_encode($allBlocks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

            if (file_put_contents($blocksJsonPath, $jsonContent) === false) {
                wp_send_json_error('Impossible d\'écrire le fichier akyos-blocks.json');
            }
        } else {
            $jsonContent = json_encode($blocks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

            if (file_put_contents($blocksJsonPath, $jsonContent) === false) {
                wp_send_json_error('Impossible d\'écrire le fichier akyos-blocks.json');
            }
        }

        $response = [
            'success' => true,
            'message' => 'Blocs ajoutés avec succès',
        ];

        wp_send_json_success($response);
    }

    // Empêcher le clonage de l'instance
    private function __clone()
    {
    }

    // Empêcher la désérialisation de l'instance
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }
}