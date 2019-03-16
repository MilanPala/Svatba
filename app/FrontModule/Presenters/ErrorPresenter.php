<?php declare(strict_types = 1);

namespace App\FrontModule\Presenters;

final class ErrorPresenter implements \Nette\Application\IPresenter
{

	use \Nette\SmartObject;

	/** @var \Tracy\ILogger */
	private $logger;


	public function __construct(\Tracy\ILogger $logger)
	{
		$this->logger = $logger;
	}


	public function run(\Nette\Application\Request $request): \Nette\Application\IResponse
	{
		$exception = $request->getParameter('exception');

		if ($exception instanceof \Nette\Application\BadRequestException) {
			list($module, , $sep) = \Nette\Application\Helpers::splitName($request->getPresenterName());

			return new \Nette\Application\Responses\ForwardResponse($request->setPresenterName($module . $sep . 'Error4xx'));
		}

		$this->logger->log($exception, \Tracy\ILogger::EXCEPTION);

		return new \Nette\Application\Responses\CallbackResponse(function () {
			require __DIR__ . '/templates/Error/500.phtml';
		});
	}

}
