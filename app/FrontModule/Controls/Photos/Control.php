<?php

namespace App\FrontModule\Controls\Photos;

/**
 * @method \Nette\Bridges\ApplicationLatte\Template
 */
class Control extends \Nette\Application\UI\Control
{

	/**
	 * @var string
	 */
	private $photosDir;


	public function __construct(
		string $photosDir
	) {
		$this->photosDir = $photosDir;
	}


	public function render(): void
	{
		/** @var \SplFileInfo[] $photosFiles */
		$photos = \Nette\Utils\Finder::findFiles('*.jpg')->in($this->photosDir);
		$this->getTemplate()->add('photos', $photos);

		$this->template->setFile(__DIR__ . '/Photos.latte');
		$this->template->render();
	}

}
