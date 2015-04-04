<?php

class IndexController extends ControllerBase
{

	/**
	 * @route public
	 */
	public function indexAction()
	{
		$this->tag->appendTitle(" | IndexController - indexAction");
		$this->view->setTemplateAfter("main");


		$last_polaroids = Polaroids::find(array(
			"columns" => "lat, lon, title",
			"order"   => "datetime_created DESC",
			"limit"   => 10
		));

		$last_routes = Routes::find(array(
			"columns" => "id, title",
			"order" => "datetime_created DESC",
			"limit" => 10
		));

		$liked_polaroids = Polaroids::find(array(
			"columns" => "id, title",
			"order" => "number_of_likes DESC",
			"limit" => 10
		));


		$this->view->setVars(array(
			"last_polaroids"  => $last_polaroids,
			"last_routes"     => $last_routes,
		    "liked_polaroids" => $liked_polaroids
		));

	}

}
