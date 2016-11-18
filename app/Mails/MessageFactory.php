<?php

namespace App\Mails;

class MessageFactory
{

	/**
	 * @var \Nette\Bridges\ApplicationLatte\ILatteFactory
	 */
	private $latteFactory;

	/**
	 * @var string
	 */
	private $wwwDir;

	/**
	 * @var string
	 */
	private $appDir;

	/**
	 * @var string
	 */
	private $fromEmail;

	/**
	 * @var string
	 */
	private $fromName;

	/**
	 * @var string
	 */
	private $toEmail;


	public function __construct(
		string $wwwDir,
		string $appDir,
		string $fromEmail,
		string $fromName,
		string $toEmail,
		\Nette\Bridges\ApplicationLatte\ILatteFactory $latteFactory
	) {
		$this->wwwDir = $wwwDir;
		$this->appDir = $appDir;
		$this->latteFactory = $latteFactory;
		$this->fromEmail = $fromEmail;
		$this->fromName = $fromName;
		$this->toEmail = $toEmail;
	}


	public function create(string $subject, string $templatePath, array $templateParameters)
	{
		$message = new \Nette\Mail\Message();

		$latte = $this->latteFactory->create();

		$latte->addFilter('bool', function (string $value) {
			return $value ? 'ano' : 'ne';
		});

		$cb = function (\Latte\Runtime\Template $template) {
			$layoutFile = __DIR__ . '/@layout.latte';
			if ($template->getName() !== $layoutFile) {
				return $layoutFile;
			} else {
				return NULL;
			}
		};
		$latte->addProvider('coreParentFinder', $cb);

		$templateParameters['subject'] = $subject;
		$message->setSubject($subject);

		$message->setFrom($this->fromEmail, $this->fromName);
		$message->addTo($this->toEmail);

		$message->setBody(
			$latte->renderToString($templatePath, $templateParameters),
			$this->wwwDir
		);

		return $message;
	}

}
