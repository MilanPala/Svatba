<?php declare(strict_types = 1);

namespace App\FrontModule\Controls\Photos;

final class Photo
{

	/** @var \SplFileInfo */
	private $file;

	/** @var array|null */
	private $imageSize = NULL;


	public function __construct(
		\SplFileInfo $file
	) {
		$this->file = $file;
		$this->imageSize = getimagesize($this->file->getRealPath());
	}


	public function getWidth(): int
	{
		return $this->imageSize[0];
	}


	public function getHeight(): int
	{
		return $this->imageSize[1];
	}


	public function getFile(): \SplFileInfo
	{
		return $this->file;
	}

}
