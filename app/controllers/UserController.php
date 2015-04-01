<?php

class UserController extends ControllerBase
{

	/**
	 * @route public
	 *
	 * show user profile
	 */
    public function indexAction($name = null)
    {
	    $this->tag->appendTitle(" | UserController - indexAction");
	    $this->view->setTemplateAfter("main");

    }

	/**
	 * @route private
	 */
	public function profileAction()
	{
		$this->tag->appendTitle(" | UserController - profileAction");
		$this->view->setTemplateAfter("main");

	}

	/**
	 * @route private
	 */
	public function accountAction()
	{
		$this->tag->appendTitle(" | UserController - accountAction");
		$this->view->setTemplateAfter("main");

	}

	/**
	 * @route private
	 */
	public function placesAction()
	{
		$this->tag->appendTitle(" | UserController - placesAction");
		$this->view->setTemplateAfter("main");

	}

	/**
	 * @route private
	 */
	public function routesAction()
	{
		$this->tag->appendTitle(" | UserController - routesAction");
		$this->view->setTemplateAfter("main");
	}

	/**
	 * @route private
	 */
	public function followingAction()
	{
		$this->tag->appendTitle(" | UserController - followingAction");
		$this->view->setTemplateAfter("main");

	}
}

