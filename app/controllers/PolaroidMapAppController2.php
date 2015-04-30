<?php

class PolaroidmapappController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
		$this->dispatcher->forward(array(
			"controller" => "index",
			"action"     => "index"
		));
    }

}

