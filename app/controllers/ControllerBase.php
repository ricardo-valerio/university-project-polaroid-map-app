<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function initialize()
	{
		$this->tag->setDoctype(\Phalcon\Tag::HTML5);
		$this->tag->setTitle("Polaroid-Map-App");

		$this->getLoggedUserInfo();
	}

	/**
	 * este método irá buscar à base de dados informação sobre o
	 * user que fez login na aplicação e como irá ser chamado no método
	 * initialize do ControllerBase, irá ser inicializado para todas as
	 * actions de todos os controllers
	 *
	 * http://docs.phalconphp.com/en/latest/reference/controllers.html#initializing-controllers
	 */
	protected function getLoggedUserInfo()
	{
		if ($this->session->has("auth")) {
			$logged_user = Users::findFirst($this->session->get('auth')['id']);
			$this->view->setVar("logged_user", $logged_user);
		}
	}

}
