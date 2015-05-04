<?php

class FindController extends ControllerBase
{

	public function initialize()
	{
		$this->view->setTemplateAfter("show-layout");

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
	 */
	public function indexAction()
    {
	    $this->tag->appendTitle(" | FindController - indexAction");

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
		$query_filtered = $this->filter->sanitize($q, array("string", "striptags"));

		if (!Polaroids::count("title LIKE '%" . $query_filtered . "%'")) {
			return $this->response->redirect("/find/all");
		}

		$this->view->setVar("searched_query", $query_filtered);


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


		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Polaroids::find("title LIKE '%" . $query_filtered . "%'"),
				"limit" => 10,
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
		$query_filtered = $this->filter->sanitize($q, array("string", "striptags"));

		if (!Users::count("full_name LIKE '%" . $query_filtered . "%'")){
			$this->response->redirect("/find/all");
		}


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


		$this->view->setVar("searched_query", $query_filtered);

		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Users::find("full_name LIKE '%" . $query_filtered . "%'"),
				"limit" => 10,
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


		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Users::find(),
				"limit" => 10,
				"page"  => $current_page
			)
		);

		$page = $paginator->getPaginate();
		$this->view->setVar("page", $page);

	}

	public function allPolaroidsAction($current_page = 1)
	{
		$this->tag->appendTitle(" | FindController - allPolaroidsAction");

		$paginator = new Phalcon\Paginator\Adapter\Model(
			array(
				"data"  => Polaroids::find(),
				"limit" => 10,
				"page"  => $current_page
			)
		);

		$page = $paginator->getPaginate();


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


		$this->view->setVar("page", $page);
	}

	public function allRoutesAction($current_page = 1)
	{
		$this->tag->appendTitle(" | FindController - allRoutesAction");

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

	public function countryAction($country = null)
	{
		$country_filtered = $this->filter->sanitize($country, array("string", "striptags"));

		$this->assets
				->collection('header_css')
					->addCss("/css/flagicon/flag-icon.css");

		if ($country_filtered != NULL) {

			echo "Country in url: ", $country_filtered;

			if (CountriesIcons::findFirst("country_short_name = '$country_filtered'")) {
				return $this->view->setVars(array(
							"country_long_name" => CountriesIcons::findFirst("country_short_name = $country_filtered")->country_long_name,
							"number_of_users_in_country"     => Users::count("country = $country_filtered"),
							"number_of_polaroids_in_country" => Polaroids::count("country = $country_filtered")
					   ));
			}else{
				return $this->response->redirect("/find-by-country");
			}
		}else{
			// ir buscar todos os paises e mostrar todas as bandeiras
			// de todos os paises para o user poder escolher uma bandeira
			return $this->view->setVars(array(
						"all_countries" => CountriesIcons::find()
				   ));
		}
	}

}

