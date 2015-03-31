<?php

class IndexController extends ControllerBase
{

	/**
	 * @route public
	 */
	public function indexAction()
	{
		$this->view->setTemplateAfter("main");
		$this->tag->appendTitle(" | IndexController - indexAction");
	}

}
