<?php

namespace Akyos\Blocks;

use Illuminate\Console\Command;

class OverrideBlockAssetsCommand extends Command
{
    protected $signature = 'import:block:assets';

    // Fonction exécutée lors de l'appel de la commande

    /**
     * @throws \JsonException
     */
    public function handle()
    {
        $block = $this->ask('Slug of the block ? (-1 for all)', '');
        $loader = new AkyosBlocksLoader();

        $blocks = json_decode(file_get_contents($loader::$jsonConfig), true, 512, JSON_THROW_ON_ERROR);
        $table = [];

        if ($block === '-1') {
            $this->info('Importing all block assets...');
            $progress = \WP_CLI\Utils\make_progress_bar('Importing assets', count($blocks));

            foreach ($blocks as $block) {
                $this->info('Importing assets for block: ' . $block);
                $table[] = $loader->importAssets($block);
                $progress->tick();
            }

            $progress->finish();
        } else {
            $this->info('Importing assets for block: ' . $block);
            $table[] = $loader->importAssets($block);
        }

        \WP_CLI::line("");
        \WP_CLI\Utils\format_items('table', $table, ['Block', 'CSS', 'JS', 'Dependencies']);
        \WP_CLI::line("");
        \WP_CLI::success('Assets imported successfully.');
        \WP_CLI::warning("For JS files : instanciate the class in the main.js");

        $this->output->success('You can run yarn && yarn build to compile the assets.');

    }
}
