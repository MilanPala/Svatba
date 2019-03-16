<?php declare(strict_types = 1);

namespace App\FrontModule\Controls\Menu;

interface IFactory
{

	public function create() : Control;

}
