<?php

namespace Akyos\Blocks;

use Illuminate\Console\Command;

class OverrideBlockCommand extends Command
{
    protected $signature = 'override:block';

    // Fonction exécutée lors de l'appel de la commande

    /**
     * @throws \JsonException
     */
    public function handle()
    {
        $blocks = json_decode(file_get_contents(get_template_directory() . '/akyos-blocks.json'), true, 512, JSON_THROW_ON_ERROR);
        $choices = [];

        for($index = 0; $index < count($blocks); $index++) {
            $choices[$index] = array_values($blocks)[$index];
        }

        $block = $this->choice('Choose the block', $choices);

        $sourceFile = __DIR__ . '/../resources/views/blocks/' . $block . '.blade.php';
        $destinationFile = get_template_directory() . '/resources/views/blocks/' . $block . '.blade.php';

        if (file_exists($sourceFile)) {
            if (copy($sourceFile, $destinationFile)) {
                $this->info('Le fichier '.$block.'.php a été copié avec succès dans le thème.');
            } else {
                $this->error('Échec de la copie du fichier '.$block.'.php');
            }
        } else {
            $this->error('Le fichier source '.$block.'.php  n\'existe pas.');
        }
    }
}
