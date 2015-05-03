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

		$this->assets
			->collection('header')
				->addJs("http://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true", FALSE);

		$this->assets
			->collection('footer')
				->addJs("/js/app-main-map.js")
				->addJs("/js/app-left-side-nav.js");


		$this->view->setVars(array(
			"last_polaroids"  => Polaroids::find(array(
				"columns" => "lat, lon, title",
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

}
