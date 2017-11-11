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

		/** @var \SplFileInfo[] $splPhotos */
		$splPhotos = iterator_to_array(\Nette\Utils\Finder::findFiles('*.jpg')->in($this->photosDir)->getIterator());
		ksort($splPhotos, SORT_NATURAL);
		$photos = [];
		foreach ($splPhotos as $splPhoto) {
			$photo = new Photo($splPhoto);
			$photos[] = $photo;
		}
		$this->getTemplate()->add('photos', $photos);

		$this->template->setFile(__DIR__ . '/Photos.latte');
		$this->template->render();
	}

}
