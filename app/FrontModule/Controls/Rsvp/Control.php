<?php

namespace App\FrontModule\Controls\Rsvp;

class Control extends \Nette\Application\UI\Control
{

	const ARRIVE_SATURDAY = 'saturday';
	const ARRIVE_FRIDAY = 'friday';

	const STARTER_ONE = 'one';
	const STARTER_TWO = 'two';

	const ARRIVES = [
		self::ARRIVE_FRIDAY => 'v pátek',
		self::ARRIVE_SATURDAY => 'v sobotu',
	];

	const STARTERS = [
		self::STARTER_ONE => 'paštiku z kachních jatýrek',
		self::STARTER_TWO => 'carpaccio z červené řepy s kozím sýrem',
	];

	/**
	 * @var \Monolog\Logger
	 */
	private $rsvpLogger;

	/**
	 * @var \App\FrontModule\Mails\RsvpMail
	 */
	private $rsvpMail;


	public function __construct(
		\Monolog\Logger $rsvpLogger,
		\App\FrontModule\Mails\RsvpMail $rsvpMail
	) {
		$this->rsvpLogger = $rsvpLogger;
		$this->rsvpMail = $rsvpMail;
	}


	public function render()
	{
		$this->template->setFile(__DIR__ . '/Rsvp.latte');
		$this->template->render();
	}


	protected function createComponentForm() : \Nette\Application\UI\Form
	{
		$form = new \Nette\Application\UI\Form();

		$form
			->addText('name', 'Tvé jméno')
			->setRequired('Potřebovali bychom znát alespoň tvé jméno')
		;
		$form
			->addTextArea('song', 'Napište nám prosím na jakou oblíbenou skladbu byste si chtěli na svatbě zatančit')
			->setRequired('Napište nám prosím svou skladbu')
		;
		$form
			->addCheckbox('partner', 'Přijedu s partnerem');
		$form
			->addCheckbox('children', 'Přijedu s dětmi');
		$form
			->addRadioList('arrive', 'Přijedeme', self::ARRIVES)
			->setDefaultValue(self::ARRIVE_FRIDAY)
		;
		$form
			->addRadioList('starter', 'Jako předkrm si dám', self::STARTERS)
			->setDefaultValue(self::STARTER_ONE)
		;
		$form
			->addRadioList('starterPartner', 'Můj partner si dá', self::STARTERS)
			->setDefaultValue(self::STARTER_ONE)
		;
		$form
			->addTextArea('message', 'Chtěli byste nám ještě něco vzkázat?');
		$form
			->addSubmit('send', 'Poslat svatební poštou');

		$form->onSuccess[] = function (\Nette\Application\UI\Form $form) {
			$this->processForm($form, $form->getValues(TRUE));
		};

		return $form;
	}


	private function processForm(\Nette\Application\UI\Form $form, array $data)
	{
		$this->rsvpLogger->addInfo('Byla přidána nová odpověď', ['data' => $data]);
		$this->rsvpMail->send($data['name'], $data['partner'], $data['children'], $data['arrive'], $data['starter'], $data['starterPartner'], $data['song'], $data['message']);

		$this->getPresenter()->flashMessage('Moc děkujeme za potvrzení. Těšíme se na viděnou.', 'ok');
		$this->redirect('this');
	}
}
