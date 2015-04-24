<?php

class UserController extends ControllerBase
{

	public function initialize()
	{
		$this->assets
			->collection("footer")
				->addJs("/js/app-search-bar.js");


		$this->view->setVars(array(
			"last_polaroids"  => Polaroids::find(array(
				"columns" => "id, title",
				"order"   => "datetime_created DESC",
				"limit"   => 10
			)),
			"last_routes"     => Routes::find(array(
				"columns" => "id, title",
				"order"   => "datetime_created DESC",
				"limit"   => 10
			)),
			"liked_polaroids" => Polaroids::find(array(
				"columns" => "id, title",
				"order"   => "number_of_likes DESC",
				"limit"   => 10
			))
		));
	}
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
		$this->view->setTemplateAfter("show-layout");

		$this->assets
				->collection("footer")
					->addJs("/js/app-search-bar.js");

		$user_id = $this->dispatcher->getParam("user_id", "int");

		$this->view->setVars(array(
			"last_polaroids"  => Polaroids::find(array(
				"columns" => "id, title",
				"order"   => "datetime_created DESC",
				"limit"   => 10
			)),
			"last_routes"     => Routes::find(array(
				"columns" => "id, title",
				"order"   => "datetime_created DESC",
				"limit"   => 10
			)),
			"liked_polaroids" => Polaroids::find(array(
				"columns" => "id, title",
				"order"   => "number_of_likes DESC",
				"limit"   => 10
			))
		));

		if ($user_id != NULL)
		{
			return $this->view->setVars(array(
				"user_info"                => Users::findFirst($user_id),
				"number_of_user_polaroids" => Polaroids::count("id_user = " . $user_id),
				"user_polaroids"           => Polaroids::find(array(
					"conditions" => "id_user = " . $user_id,
					"order"      => "datetime_created DESC"
				)),
				"number_of_user_routes"    => Routes::count("id_user = " . $user_id),
				"user_routes"              => Routes::find(array(
					"conditions" => "id_user = " . $user_id,
					"order"      => "datetime_created DESC"
				))
			));

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


		return $this->view->setVars(array(
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

		return $this->view->setVars(array(
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

		return $this->view->setVars(array(
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
		return $this->view->setVar("following", $following);
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

