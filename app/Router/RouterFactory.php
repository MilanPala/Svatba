<?php

namespace App\Router;

use Nette;


class RouterFactory
{

	use Nette\SmartObject;


	public function createRouter() : Nette\Application\IRouter
	{
		$router = new Nette\Application\Routers\RouteList();
		$router[] = new Nette\Application\Routers\Route('<presenter>/<action>[/<id>]', 'Front:Homepage:default');

		return $router;
	}

}
