<?php

class FindController extends ControllerBase
{

	/**
	 * @route public
	 */
	public function indexAction()
    {
	    $this->tag->appendTitle(" | FindController - indexAction");
	    $this->view->setTemplateAfter("main");
    }

	/**
	 * @route public
	 */
	public function placesAction()
	{
		$this->tag->appendTitle(" | FindController - placesAction");
		$this->view->setTemplateAfter("main");

	}

	/**
	 * @route public
	 */
	public function routesAction()
	{
		$this->tag->appendTitle(" | FindController - routesAction");
		$this->view->setTemplateAfter("main");
	}

	/**
	 * @route public
	 */
	public function usersAction()
	{
		$this->tag->appendTitle(" | FindController - usersAction");
		$this->view->setTemplateAfter("main");
	}
}

