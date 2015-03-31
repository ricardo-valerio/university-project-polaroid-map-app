<?php

class FindController extends ControllerBase
{

	/**
	 * @route public
	 */
	public function indexAction()
    {
		$this->view->setTemplateAfter("main");
	    $this->tag->appendTitle(" | FindController - indexAction");
    }

	/**
	 * @route public
	 */
	public function placesAction()
	{

	}

	/**
	 * @route public
	 */
	public function routesAction()
	{

	}

	/**
	 * @route public
	 */
	public function usersAction()
	{

	}
}

