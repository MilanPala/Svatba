<?php

namespace App\FrontModule\Presenters;

class MediaPresenter extends Presenter
{

	/**
	 * @var \App\FrontModule\Controls\Photos\IFactory
	 */
	private $photosControlFactory;

	/**
	 * @var string
	 */
	private $photosDir;

	/**
	 * @var string
	 */
	private $otherPhotosDir;


	public function __construct(
		\App\FrontModule\Controls\Photos\IFactory $factory,
		string $photosDir,
		string $otherPhotosDir
	)
	{
		$this->photosControlFactory = $factory;
		$this->photosDir = $photosDir;
		$this->otherPhotosDir = $otherPhotosDir;
	}


	protected function createComponentPhotos(): \Nette\Application\UI\Control
	{
		return $this->photosControlFactory->create($this->photosDir);
	}


	protected function createComponentPhotosOthers(): \Nette\Application\UI\Control
	{
		return $this->photosControlFactory->create($this->otherPhotosDir);
	}

}
