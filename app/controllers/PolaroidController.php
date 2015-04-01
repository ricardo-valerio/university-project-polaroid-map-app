<?php

class PolaroidController extends ControllerBase
{

	/**
	 * @route private
	 */
	public function indexAction()
    {
	    $this->tag->appendTitle(" | PolaroidController - indexAction");
	    $this->view->setTemplateAfter("main");

    }

	/**
	 * @route private
	 *
	 * criar uma polaroid nova associada a um place
	 */
	public function createAction()
	{
		$this->tag->appendTitle(" | PolaroidController - createAction");
		$this->view->setTemplateAfter("main");

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
		$this->view->setTemplateAfter("main");
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

