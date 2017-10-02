<?php

namespace App\Router;

use Nette;


class RouterFactory
{

	use Nette\SmartObject;

	/**
	 * @var string
	 */
	private $photosDir;

	/**
	 * @var string
	 */
	private $allPhotosFileUrl;


	public function __construct(
		string $photosDir,
		string $allPhotosFileUrl
	) {
		$this->photosDir = $photosDir;
		$this->allPhotosFileUrl = $allPhotosFileUrl;
	}


	public function createRouter(): Nette\Application\IRouter
	{
		$router = new Nette\Application\Routers\RouteList();

		$metadata = [
			'module' => 'Front',
			'presenter' => 'Photo',
			'action' => [
				Nette\Application\Routers\Route::VALUE => 'large',
				Nette\Application\Routers\Route::FILTER_TABLE => [
					'nahledy' => 'small',
				],
			],
			'file' => [
				Nette\Application\Routers\Route::FILTER_IN => function ($value) {
					return $value;
				},
				Nette\Application\Routers\Route::FILTER_OUT => function (\SplFileInfo $value) {
					return $value->getFilename();
				},
			],
		];
		$mask = $this->photosDir . '[/<action [a-z]+>]/<file [a-zA-Z0-9_.]+>';
		$router[] = new Nette\Application\Routers\Route($mask, $metadata);

		$router[] = new Nette\Application\Routers\Route('rsvp', 'Front:Rsvp:default', [Nette\Application\Routers\Route::ONE_WAY]);
		$router[] = new Nette\Application\Routers\Route('fotografie', 'Front:Media:default', [Nette\Application\Routers\Route::ONE_WAY]);
		$router[] = new Nette\Application\Routers\Route('video', 'Front:Media:default', [Nette\Application\Routers\Route::ONE_WAY]);

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
					'fotografie-video' => 'Media',
					$this->allPhotosFileUrl => 'Download',
				],
			],
			'action' => 'default',
			'id' => NULL,
		];
		$router[] = new Nette\Application\Routers\Route('<presenter>', $metadata);

		return $router;
	}

}
