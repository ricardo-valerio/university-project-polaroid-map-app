<?php

class IndexController extends ControllerBase
{

	/**
	 * @route public
	 */
	public function indexAction()
	{
		$this->tag->appendTitle(" | IndexController - indexAction");
		$this->view->setTemplateAfter("main");

	}

}
