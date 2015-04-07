<?php

class PolaroidController extends ControllerBase
{

	public function initialize()
	{
		parent::initialize();
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

		if ($this->request->isPost() 
			&& $this->request->hasPost("polaroid_location")
			&& $this->security->checkToken()) {

			$this->view->disable();


			var_dump($_POST);
			print_r(pathinfo($this->request->getPost("polaroid_location")));

			$content = file_get_contents($this->request->getPost("polaroid_location"));
			file_put_contents("http://localhost:8080/polaroid-map-app/create-polaroid/public/img/", $content);

			echo '<img src="public/img/">'. pathinfo($this->request->getPost("polaroid_location"))["basename"];

		}
	}

	/**
	 * @route public
	 *
	 * photo detail
	 *
	 * @param $id - id da photo polaroid
	 */
	public function showAction()
	{
		$this->tag->appendTitle(" | PolaroidController - showAction");

		$polaroid_id = $this->dispatcher->getParam("polaroid_id", "int");

		if ($polaroid_id != NULL) {
			// ir à base de dados buscar toda a info da polaroid

			// passar o result set retornado para a view
			return $this->view->setVar("polaroid_id", $polaroid_id);

		} else {
			$this->flashSession->error("O id não existe ou não é válido");
		}

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

	/**
	 * @route private
	 */
	public function commentAction()
	{
		if ($this->request->isPost()
			&& $this->request->hasPost("polaroid_id")
			&& $this->security->checkToken()
		) {

			$comment_polaroid = $this->request->getPost('comment_polaroid', array('string', 'striptags'));
			$polaroid_id      = $this->request->getPost('comment_polaroid', 'int');
			$user_id          = $this->session->get('auth')['id'];


			$polaroid_has_new_comment              = new PolaroidHasComments();
			$polaroid_has_new_comment->comment     = $comment_polaroid;
			$polaroid_has_new_comment->id_user     = $user_id;
			$polaroid_has_new_comment->id_polaroid = $polaroid_id;


			if ($polaroid_has_new_comment->save())
			{
				return $this->response->redirect("/polaroid/show/" . $polaroid_id);
			} else
			{
				foreach ($polaroid_has_new_comment->getMessages() as $message)
				{
					$this->flashSession->error((string)$message);
				}
			}

		}

	}


}

