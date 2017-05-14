<?php declare(strict_types = 1);

namespace App\FrontModule\Controls\Menu;

class Node
{

	use \Nette\SmartObject;

	/**
	 * @var string
	 */
	private $label;

	/**
	 * @var string
	 */
	private $presenterName;

	/**
	 * @var bool
	 */
	private $selected;


	public function __construct(
		string $label,
		string $presenterName,
		bool $selected = FALSE
	) {
		$this->label = $label;
		$this->presenterName = $presenterName;
		$this->selected = $selected;
	}


	public function getLabel(): string
	{
		return $this->label;
	}


	public function getPresenterName(): string
	{
		return $this->presenterName;
	}


	public function isSelected(): bool
	{
		return $this->selected;
	}

}
