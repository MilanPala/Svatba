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


	public function send(string $name, bool $partner, bool $children, string $arrive, string $starter, string $starterPartner, string $song, string $message)
	{
		$parameters = [
			'name' => $name,
			'partner' => $partner,
			'children' => $children,
			'arrive' => $arrive,
			'starter' => $starter,
			'starterPartner' => $starterPartner,
			'song' => $song,
			'message' => $message,
		];
		$message = $this->messageFactory->create('Potvrzení účasti na svatbě', __DIR__ . '/Rsvp.latte', $parameters);

		$this->mailer->send($message);
	}
}
