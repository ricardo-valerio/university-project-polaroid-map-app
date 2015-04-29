<?php

class AjaxController extends ControllerBase
{

	/**
	 * @route private
	 */
	public function indexAction()
    {
//	    $users = Users::find(array(
//		    "conditions" => "name LIKE '%" . $this->request->getQuery("q", "string") . "%'"
//	    ));
    }


	public function searchBarAction()
	{
		$this->view->disable();
		$this->response->setContentType('application/json', 'UTF-8');

		if (!$this->request->hasQuery("q")) {
			return [];
		} else {
			$q = trim($this->request->getQuery("q", array("string", "striptags")));

			if (!empty($q)) {

				$data["search_query"] = $this->escaper->escapeHtml($q);

				$users = Users::find(array(
					"conditions" => "username LIKE '%" . $q . "%'",
					"limit"      => 3
				));

				foreach ($users as $user) {
					$data["users"][] = array(
						"id"       => $user->id,
						"username" => $this->tag->friendlyTitle($user->username, "-"),
						"avatar"   => "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email))),
						"country"  => $user->country
					);
				}


				$polaroids = Polaroids::find(array(
					"conditions" => "title LIKE '%" . $q . "%'",
					"limit"      => 3
				));

				foreach ($polaroids as $polaroid) {
					$data["polaroids"][] = array(
						"id"                  => $polaroid->id,
						"title"               => $polaroid->title,
						"title_friendly"      => $this->tag->friendlyTitle($polaroid->title, "-"),
						"hash_photo_location" => "/polaroid-map-app/public/img/polaroids/" . $polaroid->photo_hash_file_name,
						"country"             => $polaroid->country
					);
				}

				$routes = Routes::find(array(
					"conditions" => "title LIKE '%" . $q . "%'",
					"limit"      => 3
				));

				foreach ($routes as $route) {
					$data["routes"][] = array(
						"id"             => $route->id,
						"title"          => $route->title,
						"icon"           => "/polaroid-map-app/public/img/misc/routes.png",
						"title_friendly" => $this->tag->friendlyTitle($route->title, "-")
					);
				}

				echo json_encode($data);
			}
		}
	}


	public function anotherAction()
	{

	}

}

