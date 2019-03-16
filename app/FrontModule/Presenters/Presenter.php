<?php declare(strict_types = 1);

namespace App\FrontModule\Presenters;

abstract class Presenter extends \Nette\Application\UI\Presenter
{

	/**
	 * @var \App\FrontModule\Controls\Menu\IFactory
	 */
	private $menuControlFactory;


	public function injectServices(
		\App\FrontModule\Controls\Menu\IFactory $menuControlFactory
	) {
		$this->menuControlFactory = $menuControlFactory;
	}


	protected function createComponentMenu() : \App\FrontModule\Controls\Menu\Control
	{
		$control = $this->menuControlFactory->create();

		return $control;
	}

}
