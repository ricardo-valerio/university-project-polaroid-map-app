<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function initialize()
	{
		$this->tag->setDoctype(\Phalcon\Tag::HTML5);
		$this->tag->setTitle("Polaroid-Map-App");
	}
}
