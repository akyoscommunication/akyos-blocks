<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Blocks\Acf\Fields\AkyB_Partenaire1;
use Akyos\Blocks\Acf\Fields\AkyB_Pricing1;
use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Tab;

class AkyB_Pricing extends Block
{
	public function __construct()
	{
	}

	protected static function block(): GutenbergBlock
	{
		return (new GutenbergBlock())
            ->setName("pricing")
            ->setTitle("AKYB Prix")
            ->setCategory("content")
            ->setIcon("cart");
	}

	protected static function fields(): array
	{
		return [
            Tab::make('Contenu'),
            RadioButton::make('Style du bloc', 'style')
                ->choices([
                    '1' => 'Style 1',
                ])->default('1'),
            AkyB_Pricing1::make('Prix', 'pricing1')
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('style', '==', '1')
                ]),
		];
	}

	public function render()
	{
		return $this->view('akyos-blocks::blocks.pricings.pricing');
	}
}
