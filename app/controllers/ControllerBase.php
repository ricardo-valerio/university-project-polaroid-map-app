<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function initialize()
	{
		$this->tag->setDoctype(\Phalcon\Tag::HTML5);
		$this->tag->setTitle("Polaroid-Map-App");

	}

	public function afterExecuteRoute($dispatcher)
	{
		if ($this->session->has("photo_name")) {
			$old_image_uploaded = "img/polaroids/" . $this->session->get("photo_name");
			unlink($old_image_uploaded);
			$this->session->remove("photo_name");
		}
	}
}
