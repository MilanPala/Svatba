<?php

namespace App\Router;

use Nette;


class RouterFactory
{

	use Nette\SmartObject;

	/**
	 * @var string
	 */
	private $allPhotosFileUrl;

	/**
	 * @var string
	 */
	private $allPhotosFile;

	/**
	 * @var string
	 */
	private $wwwDir;


	public function __construct(
		string $wwwDir,
		string $allPhotosFileUrl,
		string $allPhotosFile
	) {
		$this->allPhotosFileUrl = $allPhotosFileUrl;
		$this->allPhotosFile = $allPhotosFile;
		$this->wwwDir = $wwwDir;
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
			NULL => [
				\Nette\Application\Routers\Route::FILTER_IN => function (array $params) {
					return $params;
				},
				\Nette\Application\Routers\Route::FILTER_OUT => function (array $params) {
					$params['photoDir'] = substr($params['file']->getPath(), strlen($this->wwwDir) + 1);
					return $params;
				},
			],
		];
		$mask = '<photoDir>[/<action [a-z]+>]/<file [a-zA-Z0-9_.]+>';
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
					'libanky' => 'Honeymoon',
					$this->allPhotosFileUrl => 'AllPhotos',
					$this->allPhotosFile => 'Download',
				],
			],
			'action' => 'default',
			'id' => NULL,
		];
		$router[] = new Nette\Application\Routers\Route('<presenter [a-zA-Z0-9.\-]+>', $metadata);

		return $router;
	}

}
