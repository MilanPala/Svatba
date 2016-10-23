<?php

namespace App\FrontModule\Controls\Menu;

class Control extends \Nette\Application\UI\Control
{

	public function render()
	{
		$this->template->setFile(__DIR__ . '/Menu.latte');
		$this->template->render();
	}
}
