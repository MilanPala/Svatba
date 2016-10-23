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


	public function __construct(
		string $wwwDir,
		string $appDir,
		\Nette\Bridges\ApplicationLatte\ILatteFactory $latteFactory
	) {
		$this->wwwDir = $wwwDir;
		$this->appDir = $appDir;
		$this->latteFactory = $latteFactory;
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

		$message->setBody(
			$latte->renderToString($templatePath, $templateParameters),
			$this->wwwDir
		);

		return $message;
	}

}
