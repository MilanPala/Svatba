<?php

namespace App\FrontModule\Presenters;

class RsvpPresenter extends Presenter
{

	/**
	 * @var \App\FrontModule\Controls\Rsvp\IFactory
	 */
	private $rsvpControlFactory;


	public function __construct(
		\App\FrontModule\Controls\Rsvp\IFactory $rsvpControlFactory
	) {
		$this->rsvpControlFactory = $rsvpControlFactory;
	}


	protected function createComponentRsvp() : \App\FrontModule\Controls\Rsvp\Control
	{
		$control = $this->rsvpControlFactory->create();

		return $control;
	}

}
