<?php declare(strict_types = 1);

namespace App\FrontModule\Controls\Menu;

final class Control extends \Nette\Application\UI\Control
{

	/**
	 * @var array
	 */
	private $menu;


	public function __construct()
	{
		$cb = function (\Nette\Application\IPresenter $presenter) {
			$menu = [
				'Front:Ceremony' => 'Obřad',
				'Front:Speech' => 'Proslov',
				'Front:Party' => 'Oslava',
				'Front:Accommodation' => 'Ubytování',
				'Front:Programme' => 'Program',
				'Front:Media' => 'Fotky a video',
				'Front:Honeymoon' => 'Líbánky',
			];

			$this->menu = [];
			foreach ($menu as $presenterName => $label) {
				$this->menu[] = new Node($label, $presenterName, $presenterName === $presenter->getName());
			}
		};
		$this->monitor(\Nette\Application\IPresenter::class, $cb);
	}


	public function render()
	{
		$this->template->setFile(__DIR__ . '/Menu.latte');

		$this->template->menu = $this->menu;

		$this->template->render();
	}
}
