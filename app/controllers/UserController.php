<?php

class UserController extends ControllerBase
{

	/**
	 * @route public
	 *
	 * list all public people online
	 */
    public function indexAction()
    {
	    $this->tag->appendTitle(" | UserController - indexAction");
	    $this->view->setTemplateAfter("main");
    }

	/**
	 * @route public
	 *
	 * show user profile for other users
	 */
	public function showAction($user_id = NULL, $user_name = NULL)
	{
		$this->tag->appendTitle(" | UserController - indexAction");
		$this->view->setTemplateAfter("main");

		if ($user_id != NULL && is_int((int)$user_id)) {
//			$this->view->setVar("user_id", $user_id);
			$this->view->setVar("user_id", $this->dispatcher->getParam("user_id", "int"));
			if ($user_name != NULL && is_string($user_name)) {
//			    $this->view->setVar("user_name", $user_name);
				$this->view->setVar("user_name", $this->dispatcher->getParam("user_name", "string"));
			}
		}
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

