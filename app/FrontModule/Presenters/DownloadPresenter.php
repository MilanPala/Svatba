<?php

namespace App\FrontModule\Presenters;

class DownloadPresenter extends Presenter
{

	/**
	 * @var string
	 */
	private $file;


	public function __construct(
		string $file
	) {
		$this->file = $file;
	}


	public function actionDefault(): string
	{
		if ( ! is_readable($this->file)) {
			$this->error();
		}

		$this->sendResponse(new \Nette\Application\Responses\FileResponse($this->file, '2017-07-22 Svatba Terezy a Milana.zip'));
	}

}
