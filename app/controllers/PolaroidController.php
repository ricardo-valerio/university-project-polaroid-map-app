<?php

class PolaroidController extends ControllerBase
{

	public function initialize()
	{
		$this->view->setTemplateAfter("session-nav-bar");

	}
	/**
	 * @route private
	 */
	public function indexAction()
    {
	    $this->tag->appendTitle(" | PolaroidController - indexAction");

    }

	/**
	 * @route private
	 *
	 * criar uma polaroid nova associada a um place
	 */
	public function createAction()
	{
		$this->tag->appendTitle(" | PolaroidController - createAction");

	}

	/**
	 * @route public
	 *
	 * photo detail
	 *
	 * @param $id - id da photo polaroid
	 */
	public function showAction($id = null)
	{
		$this->tag->appendTitle(" | PolaroidController - showAction");
	}

	/**
	 * @route private
	 */
	public function updateAction($id = null)
	{
		$this->tag->appendTitle(" | PolaroidController - updateAction");

	}

	/**
	 * @route private
	 */
	public function deleteAction($id = null)
	{
		$this->tag->appendTitle(" | PolaroidController - deleteAction");
	}
}

