<?php

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
		$this->view->setTemplateAfter("main");
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

