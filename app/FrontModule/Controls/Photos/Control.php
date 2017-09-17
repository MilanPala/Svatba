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
		if ( ! is_readable($this->photosDir)) {
			return;
		}

		/** @var \SplFileInfo[] $photosFiles */
		$photos = iterator_to_array(\Nette\Utils\Finder::findFiles('*.jpg')->in($this->photosDir)->getIterator());
		ksort($photos);
		$this->getTemplate()->add('photos', $photos);

		$this->template->setFile(__DIR__ . '/Photos.latte');
		$this->template->render();
	}

}
