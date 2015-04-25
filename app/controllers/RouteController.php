<?php

	use Phalcon\Mvc\Router\Route;

	class RouteController extends ControllerBase
{

	/**
	 * @route private
	 */
	public function indexAction()
    {
	    $this->tag->appendTitle(" | RouteController - indexAction");
    }

	/**
	 * @route private
	 * criar uma route nova associada a photos
	 */
	public function createAction()
	{
		$this->tag->appendTitle(" | RouteController - createAction");
	}

	/**
	 * @route public
	 *
	 *  detail route
	 * @param $id - id da route polaroid
	 */
	public function showAction($id = null)
	{
		$this->tag->appendTitle(" | RouteController - showAction");
		$this->view->setTemplateAfter("show-layout");

		$this->assets
			->collection("header")
				->addJs("http://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.13", FALSE);

		$this->assets
			->collection("footer")
				->addJs("/js/vendor/maplace.js")
				->addJs("/js/app-search-bar.js");


		$route_id = $this->dispatcher->getParam("route_id", "int");

		if ($route_id != NULL) {

			return $this->view->setVars(array(
				"route_info"      => Routes::findFirst("id = " . $route_id),
				"route_polaroids" => RouteHasPolaroids::find(array(
					"conditions" => "id_route = " . $route_id,
					"order"      => "datetime_associated ASC"
				)),
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

		} else {
			$this->flashSession->error("O id não existe ou não é válido");
		}

	}

	/**
	 * @route private
	 */
	public function updateAction($id = null)
	{
		$this->tag->appendTitle(" | RouteController - updateAction");
	}

	/**
	 * @route private
	 */
	public function deleteAction($id = null)
	{
		$this->tag->appendTitle(" | RouteController - deleteAction");
	}
}

