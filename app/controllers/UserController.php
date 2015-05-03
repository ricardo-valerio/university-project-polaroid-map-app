<?php

class UserController extends ControllerBase
{

	public function initialize()
	{
		$this->assets
			->collection('footer')
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


		$user_id = $this->dispatcher->getParam("user_id", "int");


		if ($user_id != NULL)
		{
			$this->assets
					->collection('header_css')
						->addCss("/css/mason/mason_base.css")
						->addCss("/css/flagicon/flag-icon.css")
						->addCss("http://fonts.googleapis.com/css?family=Reenie+Beanie", FALSE);

				$this->assets
					->collection('header')
						->addJs("/js/mason/modernizr-transitions.js");

				$this->assets
					->collection('footer')
						->addJs("/js/mason/jquery.masonry.js")
						->addJs("/js/app-mason-start.js");

			if ($this->session->has("auth")) {
				$user_follows_user_or_not = UserIsFollowing::count("id_user_who_is_followed = $user_id AND id_user_who_follows = " . $this->session->get('auth')['id']);
			}

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
				)),
				"user_follows_user_or_not" => $user_follows_user_or_not,
				"number_of_followers"      => UserIsFollowing::count("id_user_who_is_followed = ". $user_id),
				"number_of_following"      => UserIsFollowing::count("id_user_who_follows = ". $user_id),
				"followers"                => UserIsFollowing::find(array(
													"conditions" => "id_user_who_is_followed = ". $user_id,
													"columns"    => "id_user_who_follows"
											 )),
				"following"                => UserIsFollowing::find("id_user_who_follows = ". $user_id)


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

		$this->assets
			->collection('header_css')
				->addCss("/css/mason/mason_base.css")
				->addCss("/css/flagicon/flag-icon.css")
				->addCss("http://fonts.googleapis.com/css?family=Reenie+Beanie", FALSE);

		$this->assets
			->collection('header')
				->addJs("/js/mason/modernizr-transitions.js");

		$this->assets
			->collection('footer')
				->addJs("/js/mason/jquery.masonry.js")
				->addJs("/js/app-mason-start.js");


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

		$this->assets
			->collection('header_css')
				->addCss("/css/flagicon/flag-icon.css");

		$this->view->setVar("user_info", Users::findFirst($this->session->get("auth")["id"]));

	}

	/**
	 * @route private
	 */
	public function polaroidsAction()
	{
		$this->tag->appendTitle(" | UserController - polaroidsAction");
		$this->view->setTemplateAfter("user-main");

		$this->assets
			->collection('header_css')
				->addCss("/css/mason/mason_base.css")
				->addCss("http://fonts.googleapis.com/css?family=Reenie+Beanie", FALSE);

		$this->assets
			->collection('header')
				->addJs("/js/mason/modernizr-transitions.js");

		$this->assets
			->collection('footer')
				->addJs("/js/mason/jquery.masonry.js")
				->addJs("/js/app-mason-start.js");



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

		$this->assets
			->collection('header_css')
				->addCss("/css/mason/mason_base.css")
				->addCss("http://fonts.googleapis.com/css?family=Reenie+Beanie", FALSE);

		$this->assets
			->collection('header')
				->addJs("/js/mason/modernizr-transitions.js");

		$this->assets
			->collection('footer')
				->addJs("/js/mason/jquery.masonry.js")
				->addJs("/js/app-mason-start.js");

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

		$this->assets
			->collection('header_css')
				->addCss("/css/mason/mason_base.css")
				->addCss("http://fonts.googleapis.com/css?family=Reenie+Beanie", FALSE);

		$this->assets
			->collection('header')
				->addJs("/js/mason/modernizr-transitions.js");

		$this->assets
			->collection('footer')
				->addJs("/js/mason/jquery.masonry.js")
				->addJs("/js/app-mason-start.js");

		$user_id = $this->session->get("auth")["id"];


		return $this->view->setVars(array(
			"number_of_polaroids_liked" => UserLikesPolaroid::count("id_user = " . $user_id),
			"number_of_routes_liked" => UserLikesRoute::count("id_user = " . $user_id),
			"polaroids_liked" => UserLikesPolaroid::find("id_user = " . $user_id),
			"routes_liked" => UserLikesRoute::find("id_user = " . $user_id)
		));
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
		if ($this->request->isPost()
			&& $this->request->hasPost("new_password")
			&& $this->request->hasPost("confirmed_new_password")
			&& $this->request->hasPost("current_password"))
		{

            $new_password            = $this->request->getPost("new_password", array("striptags", "string"));
            $confirmed_new_password  = $this->request->getPost("confirmed_new_password", array("striptags", "string"));
            $current_password        = $this->request->getPost("current_password", array("striptags", "string"));

            $user_in_session  		= Users::findFirst($this->session->get("auth")["id"]);
            $valid_current_password = $this->security->checkHash($current_password, $user_in_session->password);


            if (!$valid_current_password) {
            	$this->flashSession->error("incorrect current password!");
            	return $this->response->redirect("/my-account");
            }

			if ($new_password == $confirmed_new_password) {

                $user_in_session->password = $this->security->hash($new_password);

                if (!$user_in_session->update()) {
					foreach ($user->getMessages() as $message)
						$this->flashSession->error((string)$message);

					$this->response->redirect("/my-account");
                }else{
                	$this->flashSession->success("cool bro!");
                }

			}else{
				$this->flashSession->error("passwords are not equal!");
			}

		}

		return $this->response->redirect("/my-account");

	}

	public function dangerZoneAction()
	{
		if ($this->request->isPost()
			&& $this->request->hasPost("current_password")) {

			$current_password       = $this->request->getPost("current_password", array("striptags", "string"));
            $user_in_session  		= Users::findFirst($this->session->get("auth")["id"]);
            $valid_current_password = $this->security->checkHash($current_password, $user_in_session->password);


            if (!$valid_current_password) {
            	$this->flashSession->error("incorrect current password!");
            	return $this->response->redirect("/my-account");
            }

	        if (!$user_in_session->delete()) {
				foreach ($user->getMessages() as $message)
					$this->flashSession->error((string)$message);
            }else{
            	return $this->response->redirect("/logout");
            }

		}else{
			return $this->response->redirect("/my-account");
		}

	}


	public function followAction()
	{
		$this->view->disable();

		if ($this->request->isPost())
		{
			$user_to_follow_id  = $this->request->getPost("user_to_follow_id", "int");
			$username 			= Users::findFirst($user_to_follow_id)->username;

			$user_follows_user 							= new UserIsFollowing();
			$user_follows_user->id_user_who_follows 	= $this->session->get("auth")["id"];
			$user_follows_user->id_user_who_is_followed = $user_to_follow_id;

			if (!$user_follows_user->save()){
				$this->flashSession->error("Ultra Bug - Call Rv!");
			}
			else{
					$this->flashSession->success("Followed! =) <a href='#' class='close'>&times;</a>");
			}

			return $this->response->redirect("/user/" . $user_to_follow_id
					. "/" . $this->tag->friendlyTitle($username, "-"));

		}

	}

	public function unfollowAction()
	{
		$this->view->disable();

		if ($this->request->isPost())
		{
			$user_to_unfollow_id  = $this->request->getPost("user_to_unfollow_id", "int");
			$username 			  = Users::findFirst($user_to_unfollow_id)->username;


			$user_follows_user = UserIsFollowing::findFirst("id_user_who_is_followed = $user_to_unfollow_id AND id_user_who_follows = " . $this->session->get('auth')['id']);

			if (!$user_follows_user->delete()){
				$this->flashSession->error("Ultra Bug - Call Rv!");
			}
			else{
					$this->flashSession->notice("Unfollowed! =( <a href='#' class='close'>&times;</a>");
			}

			return $this->response->redirect("/user/" . $user_to_unfollow_id
					. "/" . $this->tag->friendlyTitle($username, "-"));

		}

	}

	public function unfollowFromProfileAction()
	{
		$this->view->disable();

		if ($this->request->isPost())
		{
			$user_to_unfollow_id  = $this->request->getPost("user_to_unfollow_id", "int");
			$username 			  = Users::findFirst($user_to_unfollow_id)->username;


			$user_follows_user = UserIsFollowing::findFirst("id_user_who_is_followed = $user_to_unfollow_id AND id_user_who_follows = " . $this->session->get('auth')['id']);

			if (!$user_follows_user->delete()){
				$this->flashSession->error("Ultra Bug - Call Rv!");
			}
			else{
					$this->flashSession->notice("Unfollowed! =( <a href='#' class='close'>&times;</a>");
			}

			return $this->response->redirect("/i-am-following");

		}

	}

}

