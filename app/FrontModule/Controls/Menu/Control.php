<?php

namespace App\FrontModule\Controls\Menu;

class Control extends \Nette\Application\UI\Control
{

	/**
	 * @var array
	 */
	private $menu;


	/**
	 * @param \Nette\Application\UI\Presenter $presenter
	 */
	protected function attached($presenter)
	{
		parent::attached($presenter);

		$menu = [
			'Front:Ceremony' => 'Obřad',
			'Front:Speech' => 'Proslov',
			'Front:Party' => 'Oslava',
			'Front:Accommodation' => 'Ubytování',
			'Front:Programme' => 'Program',
		];

		$this->menu = [];
		foreach ($menu as $presenterName => $label) {
			$this->menu[] = new Node($label, $presenterName, $presenterName === $presenter->getName());
		}
	}


	public function render()
	{
		$this->template->setFile(__DIR__ . '/Menu.latte');

		$this->template->menu = $this->menu;

		$this->template->render();
	}
}
