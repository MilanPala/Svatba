<?php declare(strict_types = 1);

namespace App\FrontModule\Presenters;

final class AllPhotosPresenter extends Presenter
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

		$this->redirect('301', '//:Front:Download:default');
	}

}
