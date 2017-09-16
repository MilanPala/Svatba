<?php

namespace App\Router;

use Nette;


class RouterFactory
{

	use Nette\SmartObject;


	public function createRouter() : Nette\Application\IRouter
	{
		$router = new Nette\Application\Routers\RouteList();

		$metadata = [
			'module' => 'Front',
			'presenter' => [
				Nette\Application\Routers\Route::VALUE => 'Announcement',
				Nette\Application\Routers\Route::FILTER_TABLE => [
					'obrad' => 'Ceremony',
					'proslov' => 'Speech',
					'oslava' => 'Party',
					'ubytovani' => 'Accommodation',
					'pocitame-s-vami' => 'Rsvp',
					'program' => 'Programme',
					'hudba' => 'Music',
				],
			],
			'action' => 'default',
			'id' => NULL,
		];
		$router[] = new Nette\Application\Routers\Route('<presenter>', $metadata);
		$router[] = new Nette\Application\Routers\Route('rsvp', 'Front:Rsvp:default', [Nette\Application\Routers\Route::ONE_WAY]);

		return $router;
	}

}
