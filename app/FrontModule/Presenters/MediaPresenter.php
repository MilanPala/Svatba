<?php

namespace App\FrontModule\Presenters;

class MediaPresenter extends Presenter
{

	/**
	 * @var \App\FrontModule\Controls\Photos\IFactory
	 */
	private $photosControlFactory;


	public function __construct(
		\App\FrontModule\Controls\Photos\IFactory $factory
	)
	{
		$this->photosControlFactory = $factory;
	}


	protected function createComponentPhotos(): \Nette\Application\UI\Control
	{
		return $this->photosControlFactory->create();
	}

}
