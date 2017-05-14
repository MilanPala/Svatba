<?php

namespace App\FrontModule\Controls\Rsvp;

class Control extends \Nette\Application\UI\Control
{

	const ARRIVE_SATURDAY = 'saturday';
	const ARRIVE_FRIDAY = 'friday';

	const ARRIVES = [
		self::ARRIVE_FRIDAY => 'v pátek',
		self::ARRIVE_SATURDAY => 'v sobotu',
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

		$form->addProtection('Odešlete prosím informace znovu');

		$form
			->addText('name', 'Tvé jméno')
			->setRequired('Potřebovali bychom znát alespoň tvé jméno')
		;
		$form
			->addCheckbox('partner', 'Přijdu s partnerem');
		$form
			->addCheckbox('children', 'Přijdu s dětmi');
		$form
			->addRadioList('arrive', 'Přijedu', self::ARRIVES);
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
		$this->rsvpMail->send($data['name'], $data['partner'], $data['children'], $data['arrive'], $data['message']);

		$this->getPresenter()->flashMessage('Moc děkujeme za potvrzení. Těšíme se na viděnou.');
		$this->redirect('this');
	}
}