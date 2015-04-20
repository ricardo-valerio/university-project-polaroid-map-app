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
		$this->view->setTemplateAfter("session-nav-bar");

		$route_id = $this->dispatcher->getParam("route_id", "int");

		if ($route_id != NULL) {

			// ir à base de dados buscar toda a info da route
			return $this->view->setVars(array(
				"route_info"      => Routes::findFirst("id = " . $route_id),
				"route_polaroids" => RouteHasPolaroids::find("id_route = " . $route_id)
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

