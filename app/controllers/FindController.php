<?php

class FindController extends ControllerBase
{

	/**
	 * @route public
	 */
	public function indexAction()
    {
	    $this->tag->appendTitle(" | FindController - indexAction");
	    $this->view->setTemplateAfter("session-nav-bar");

	    $this->dispatcher->forward(array(
		   "controller" => "find",
		   "action"     => "all"
	    ));

    }

	/**
	 * @route public
	 */
	public function polaroidsAction($q = "", $current_page = 1)
	{
		$this->tag->appendTitle(" | FindController - placesAction");
		$this->view->setTemplateAfter("session-nav-bar");

		$query_filtered = $this->filter->sanitize($q, array("string", "striptags"));

		if (!Polaroids::count("title LIKE '%" . $query_filtered . "%'")) {
			$this->response->redirect("/find/all");
		}

		$this->view->setVar("searched_query", $query_filtered);

		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Polaroids::find("title LIKE '%" . $query_filtered . "%'"),
				"limit" => 1,
				"page"  => $current_page
			)
		);

		$page = $paginator->getPaginate();
		$this->view->setVar("page", $page);

	}

	/**
	 * @route public
	 */
	public function routesAction($q = "", $current_page = 1)
	{
		$this->tag->appendTitle(" | FindController - routesAction");
		$this->view->setTemplateAfter("session-nav-bar");

		$query_filtered = $this->filter->sanitize($q, array("string", "striptags"));

		if (!Routes::count("title LIKE '%" . $query_filtered . "%'")) {
			$this->response->redirect("/find/all");
		}

		$this->view->setVar("searched_query", $query_filtered);

		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Routes::find("title LIKE '%" . $query_filtered . "%'"),
				"limit" => 1,
				"page"  => $current_page
			)
		);

		$page = $paginator->getPaginate();
		$this->view->setVar("page", $page);

	}

	/**
	 * @route public
	 */
	public function usersAction($q = "", $current_page = 1)
	{
		$this->tag->appendTitle(" | FindController - usersAction");
		$this->view->setTemplateAfter("session-nav-bar");

		$query_filtered = $this->filter->sanitize($q, array("string", "striptags"));

		if (!Users::count("full_name LIKE '%" . $query_filtered . "%'")){
			$this->response->redirect("/find/all");
		}

		$this->view->setVar("searched_query", $query_filtered);

		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Users::find("full_name LIKE '%" . $query_filtered . "%'"),
				"limit" => 1,
				"page"  => $current_page
			)
		);

		$page = $paginator->getPaginate();
		$this->view->setVar("page", $page);

	}

	/**
	 * @route public
	 */
	public function allAction($q = "")
	{
		$this->tag->appendTitle(" | FindController - allAction");
		$this->view->setTemplateAfter("session-nav-bar");

		$this->assets
			->collection("footer")
				->addJs("/js/foundation/foundation.orbit.js");


		$query_filtered = $this->request->hasQuery("q") ?
			$this->request->getQuery("q", array("string", "striptags")) :
			$this->filter->sanitize($q, array("string", "striptags"));

		$number_of_users     = Users::count("full_name LIKE '%" . $query_filtered . "%'");
		$number_of_polaroids = Polaroids::count("title LIKE '%" . $query_filtered . "%'");
		$number_of_routes    = Routes::count("title LIKE '%" . $query_filtered . "%'");

		$this->view->setVars(array(
			"num_users"      => $number_of_users,
			"num_polaroids"  => $number_of_polaroids,
			"num_routes"     => $number_of_routes,
			"searched_query" => $query_filtered
		));

	}

	public function allUsersAction($current_page = 1)
	{
		$this->tag->appendTitle(" | FindController - allUsersAction");
		$this->view->setTemplateAfter("session-nav-bar");


		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Users::find(),
				"limit" => 1,
				"page"  => $current_page
			)
		);

		$page = $paginator->getPaginate();
		$this->view->setVar("page", $page);

	}

	public function allPolaroidsAction($current_page = 1)
	{
		$this->tag->appendTitle(" | FindController - allPolaroidsAction");
		$this->view->setTemplateAfter("session-nav-bar");


		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Polaroids::find(),
				"limit" => 1,
				"page"  => $current_page
			)
		);

		$page = $paginator->getPaginate();
		$this->view->setVar("page", $page);
	}

	public function allRoutesAction($current_page = 1)
	{
		$this->tag->appendTitle(" | FindController - allRoutesAction");
		$this->view->setTemplateAfter("session-nav-bar");


		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Routes::find(),
				"limit" => 1,
				"page"  => $current_page
			)
		);

		$page = $paginator->getPaginate();
		$this->view->setVar("page", $page);
	}

}

