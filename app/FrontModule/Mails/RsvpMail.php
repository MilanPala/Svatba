<?php

namespace App\FrontModule\Mails;

class RsvpMail
{

	/**
	 * @var \Nette\Mail\IMailer
	 */
	private $mailer;

	/**
	 * @var \App\Mails\MessageFactory
	 */
	private $messageFactory;


	public function __construct(
		\Nette\Mail\IMailer $mailer,
		\App\Mails\MessageFactory $messageFactory
	) {
		$this->mailer = $mailer;
		$this->messageFactory = $messageFactory;
	}


	public function send(string $name, bool $partner, bool $children, string $message)
	{
		$parameters = [
			'name' => $name,
			'partner' => $partner,
			'children' => $children,
			'message' => $message,
		];
		$message = $this->messageFactory->create('Potvrzení účasti na svatbě', __DIR__ . '/Rsvp.latte', $parameters);

		$this->mailer->send($message);
	}
}
