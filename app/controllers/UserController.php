<?php

class UserController extends ControllerBase
{

	/**
	 * @route public
	 *
	 * show user profile for other users
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
		$this->view->setTemplateAfter("user-main");

	}

	/**
	 * @route private
	 */
	public function accountAction()
	{
		$this->tag->appendTitle(" | UserController - accountAction");
		$this->view->setTemplateAfter("user-main");

	}

	/**
	 * @route private
	 */
	public function placesAction()
	{
		$this->tag->appendTitle(" | UserController - placesAction");
		$this->view->setTemplateAfter("user-main");

	}

	/**
	 * @route private
	 */
	public function routesAction()
	{
		$this->tag->appendTitle(" | UserController - routesAction");
		$this->view->setTemplateAfter("user-main");
	}

	/**
	 * @route private
	 */
	public function followingAction()
	{
		$this->tag->appendTitle(" | UserController - followingAction");
		$this->view->setTemplateAfter("user-main");

	}

	public function likedAction()
	{
		$this->tag->appendTitle(" | UserController - likedAction");
		$this->view->setTemplateAfter("user-main");

	}
}

