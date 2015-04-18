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
	    $this->view->setTemplateAfter("user-main");
    }

	/**
	 * @route public
	 *
	 * show user profile for other users
	 */
	public function showAction()
	{
		$this->tag->appendTitle(" | UserController - indexAction");
		$this->view->setTemplateAfter("session-nav-bar");

		$user_id = $this->dispatcher->getParam("user_id", "int");

		if ($user_id != NULL)
		{
			return $this->view->setVar("user_id", $user_id);

		}else
		{
			$this->flashSession->error("O id não existe ou não é válido");
			return $this->response->redirect("/people-online");
		}

	}

	/**
	 * @route private
	 */
	public function profileAction()
	{
		$this->tag->appendTitle(" | UserController - profileAction");
		$this->view->setTemplateAfter("user-main");


		$this->view->setVars(array(
			"user_info"      => Users::findFirst($this->session->get("auth")["id"]),
			"user_polaroids" => Polaroids::find(array(
					"conditions" => "id_user = ". $this->session->get("auth")["id"],
					"order"      => "datetime_created DESC"
				)),
			"user_routes" => Routes::find(array(
				"conditions" => "id_user = " . $this->session->get("auth")["id"],
				"order"      => "datetime_created DESC"
			))
		));

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
	public function polaroidsAction()
	{
		$this->tag->appendTitle(" | UserController - polaroidsAction");
		$this->view->setTemplateAfter("user-main");

		$this->view->setVars(array(
			"user_polaroids" => Polaroids::find(array(
				"conditions" => "id_user = " . $this->session->get("auth")["id"],
				"order"      => "datetime_created DESC"
			))
		));

	}

	/**
	 * @route private
	 */
	public function routesAction()
	{
		$this->tag->appendTitle(" | UserController - routesAction");
		$this->view->setTemplateAfter("user-main");

		$this->view->setVars(array(
			"user_routes"    => Routes::find(array(
				"conditions" => "id_user = " . $this->session->get("auth")["id"],
				"order"      => "datetime_created DESC"
			))
		));
	}

	/**
	 * @route private
	 */
	public function followingAction()
	{
		$this->tag->appendTitle(" | UserController - followingAction");
		$this->view->setTemplateAfter("user-main");

		$following = UserIsFollowing::find("id_user_who_follows = ". $this->session->get("auth")["id"] );
		$this->view->setVar("following", $following);
	}

	/**
	 * @route private
	 */
	public function likedAction()
	{
		$this->tag->appendTitle(" | UserController - likedAction");
		$this->view->setTemplateAfter("user-main");

	}
}

