<?php

namespace Akyos\Blocks;

use Illuminate\Console\Command;

class OverrideBlockCommand extends Command
{
    protected $signature = 'override:block';

    // Fonction exécutée lors de l'appel de la commande
    public function handle()
    {
        $block = $this->ask('Slug of the block ?', '');

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
