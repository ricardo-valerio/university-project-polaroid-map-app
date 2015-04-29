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

		$this->view->setVar("user_info", Users::findFirst($this->session->get("auth")["id"]));

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

	public function personalInfoAction()
	{
		if ($this->request->isPost()) {

            $full_name   = $this->request->getPost("full_name"	, array("striptags", "string"));
            $facebook    = $this->request->getPost("facebook"	, array("striptags", "string"));
            $twitter     = $this->request->getPost("twitter"	, array("striptags", "string"));
            $google_plus = $this->request->getPost("google_plus", array("striptags", "string"));
            $bio         = $this->request->getPost("bio"		, array("striptags", "string"));
            $country     = $this->request->getPost("country"	, array("striptags", "string"));

			$user_in_session		      		   = Users::findFirst($this->session->get("auth")["id"]);
            $user_in_session->full_name            = $full_name;
            $user_in_session->facebook_username    = $facebook;
            $user_in_session->twitter_username     = $twitter;
            $user_in_session->twitter_username     = $twitter;
            $user_in_session->google_plus_username = $google_plus;
            $user_in_session->bio                  = $bio;
            $user_in_session->country              = $country;

            if ($user_in_session->update()) {
	    		$this->flashSession->success("Cool Bro!" . "<a href = '#' class='close' >&times;</a >");
				return $this->response->redirect("/my-account");
            }else{
				$this->flashSession->notice("Your are dumb!" . "<a href = '#' class='close' >&times;</a >");
				return $this->response->redirect("/my-account");
            }

		}else{
			$this->flashSession->error("Who the hell are you!?!" . "<a href = '#' class='close' >&times;</a >");
			return $this->response->redirect("/my-account");
		}
	}

	public function accountSettingsAction()
	{
			var_dump($_POST);
			$this->view->disable();
		if ($this->request->isPost()
			&& $this->security->checkToken()) {

			echo "o token passou";

		}else{
			echo "o token não passou";
		}

	}

	public function dangerZoneAction()
	{
			var_dump($_POST);
			$this->view->disable();
		if ($this->request->isPost()) {

				// verificar se a pass é valida
				// eliminar conta

			echo "o token passou";

		}else{
			echo "o token não passou";
		}

	}


}

