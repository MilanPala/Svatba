<?php declare(strict_types = 1);

namespace App\FrontModule\Controls\Rsvp;

interface IFactory
{

	public function create() : Control;
}
