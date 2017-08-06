<?php

namespace App\FrontModule\Presenters;

/**
 * @method \Nette\Bridges\ApplicationLatte\Template getTemplate()
 */
class MusicPresenter extends Presenter
{

	public function actionDefault(): void
	{
		$playlists = [
			'0uBG1JttwTzqYSLeaGNmAC' => 'Ráno',
			'7qcmWaegUjuz1dCheQepnu' => 'Setkání před obřadem',
			'7m6BjZiUL7Y0s6XlA7CLwP' => 'Jídlo a pití',
			'7Gaupr7982o40QhDsceHBp' => 'Večerní ploužáky',
			'2aFwLY29OsVrOSTTbB6wE5' => 'Taneční',
			'54Rj95XQUXZOAsty0xl34c' => 'Nevěsty oblíbené',
			'7rKR8zeTbToBEYYKuIkuhm' => 'Večerní meditace',
			'6qUIHxIVxKKhdWvY6zUVrd' => 'Písničky z pohádek',
			'0OWRr2RYfyXH7REYFFpeIL' => 'Na přání',
		];
		$this->getTemplate()->add('playlists', $playlists);
	}

}
