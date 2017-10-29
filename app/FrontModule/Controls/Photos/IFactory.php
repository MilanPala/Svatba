<?php

namespace App\FrontModule\Controls\Photos;

interface IFactory
{

	public function create(string $photosDir) : Control;

}
