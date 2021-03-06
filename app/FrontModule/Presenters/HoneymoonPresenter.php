<?php declare(strict_types = 1);

namespace App\FrontModule\Presenters;

final class HoneymoonPresenter extends Presenter
{

	/**
	 * @var \App\FrontModule\Controls\Photos\IFactory
	 */
	private $photosControlFactory;

	/**
	 * @var string
	 */
	private $photosDir;


	public function __construct(
		\App\FrontModule\Controls\Photos\IFactory $factory,
		string $photosDir
	)
	{
		$this->photosControlFactory = $factory;
		$this->photosDir = $photosDir;
	}


	protected function createComponentPhotos(): \Nette\Application\UI\Control
	{
		return $this->photosControlFactory->create($this->photosDir);
	}

}
