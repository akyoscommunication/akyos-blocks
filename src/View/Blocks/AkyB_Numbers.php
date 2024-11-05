<?php

namespace Akyos\Blocks\View\Blocks;

use Akyos\Blocks\Acf\Fields\AkyBNumbers1;
use Akyos\Blocks\Acf\Fields\AkyBNumbers2;
use Akyos\Core\Classes\Block;
use Akyos\Core\Classes\GutenbergBlock;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Tab;

class AkyB_Numbers extends Block
{
	public function __construct()
	{
	}

	protected static function block(): GutenbergBlock
	{
		return (new GutenbergBlock())
			->setName("akyb-numbers")
			->setTitle("AKYB Liste de nombre")
			->setCategory("content")
			->setIcon("editor-ol");
	}

	protected static function fields(): array
	{
		return [
			Tab::make("Contenu"),
			RadioButton::make('Style du bloc', 'style')
				->choices([
					'1' => 'Style 1 : <img style="max-width:300px;" src="'.get_template_directory_uri().'/resources/assets/images/numbers-style-1.png" alt="Style 1" />',
					'2-1' => 'Style 2-1 : <img style="max-width:300px;" src="'.get_template_directory_uri().'/resources/assets/images/numbers-style-2-1.png" alt="Style 2-1" />',
					'2-2' => 'Style 2-2 : <img style="max-width:300px;" src="'.get_template_directory_uri().'/resources/assets/images/numbers-style-2-2.png" alt="Style 2-2" />',
				])->default('1'),
			AkyBNumbers1::make('Nombre', 'number1')
				->layout('block')
				->conditionalLogic([
					ConditionalLogic::where('style', '==', '1'),
				]),
			AkyBNumbers2::make('Nombre', 'number2')
				->layout('block')
				->conditionalLogic([
					ConditionalLogic::where('style', '==', '2-1'),
					ConditionalLogic::where('style', '==', '2-2'),
				]),

		];
	}

	public function render()
	{
		return $this->view("blocks.numbers.number");
	}
}
