<?php

	use Phalcon\Tag as Tag;

	class SessionController extends ControllerBase
{

	/**
	 * @route public
	 */
	public function indexAction()
    {
	    $this->tag->appendTitle(" | SessionController - indexAction");
	    $this->view->setTemplateAfter("session-layout");

	    $this->assets
		    ->collection('footer')
			    ->addJs("/js/foundation/foundation.abide.js")
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
	public function loginAction()
	{
		if ($this->request->isPost()
			&& $this->request->hasPost("user_password")
			&& $this->security->checkToken()) {

			$email    = $this->request->getPost('user_email_or_username', 'email');
			$username = $this->request->getPost('user_email_or_username', 'alphanum');
			$password = $this->request->getPost('user_password');

			$user = Users::findFirst("(email='$email' OR username='$username')
									   AND active='Y'");

			$valid_pass = $this->security->checkHash($password, $user->password);

			if ($user != false && $valid_pass != false) {
				$this->_registerSession($user);
				if ($this->request->hasQuery("return_to")) {
					return $this->response->redirect($this->request->getQuery("return_to"));
				}
				return $this->response->redirect("/");
			}

			$this->flashSession->error('Wrong email/username or password');
			return $this->response->redirect("/sign-in-up");
		}
		return $this->response->redirect("/sign-in-up");
	}

	/**
	 * Register authenticated user into session data
	 *
	 * @param Users $user
	 */
	private function _registerSession($user)
	{
		$this->session->set('auth', array(
			'id'       => $user->id,
			'username' => $user->username
		));
	}

	/**
	 * @route private
	 */
	public function logoutAction()
	{
		if ($this->session->has("auth")) {
			$this->session->remove('auth');
			return $this->response->redirect("/");
		}
		return $this->response->redirect("/sign-in-up");
	}

	/**
	 * @route public
	 */
	public function signUpAction()
	{
		$this->tag->appendTitle(" | SessionController - signUpAction");
		$this->view->setTemplateAfter("session-nav-bar");


		if ($this->request->isPost()
			&& $this->request->hasPost("user_password")
			&& $this->security->checkToken()) {

			$fullname       = $this->request->getPost('user_full_name', array('string', 'striptags'));
			$username       = $this->request->getPost('user_name', array('striptags', 'alphanum'));
			$email          = $this->request->getPost('user_email', array('lower', 'email'));
			$password       = $this->request->getPost('user_password');
			$repeatPassword = $this->request->getPost('user_password_confirmation');

			if ($password != $repeatPassword) {
				$this->flashSession->error('Passwords are different');
				return false;
			}

			$user                      = new Users();
			$user->username            = $username;
			$user->password            = $this->security->hash($password);
			$user->full_name           = $fullname;
			$user->email               = $email;
			$user->active              = 'Y';
			$user->datetime_last_login = date('Y-m-d H:i:s');

			if ($user->save() == false) {
				foreach ($user->getMessages() as $message) {
					$this->flashSession->error((string)$message);
				}
			} else {
				$this->flashSession->success('Thanks for sign-up, please log-in to
				start creating polaroids!');

				return $this->response->redirect("/sign-in-up");
			}
		}

		 $this->assets
		    ->collection('footer')
			    ->addJs("/js/foundation/foundation.abide.js");

	}
}

