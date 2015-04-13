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

		if ($polaroid_id != NULL)
		{
			$this->view->setVars(array(
				"polaroid_info"     => Polaroids::findFirst($polaroid_id),
				"polaroid_comments" => PolaroidHasComments::find(array(
					"conditions" => "id_polaroid = $polaroid_id",
					"order"      => "datetime_created DESC"
				))
			));

		} else
		{
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


	public function uploadAction()
	{
		$this->view->disable();

		if ($this->request->isPost() 
			&& $this->security->checkToken()
			&& $this->request->hasFiles()
			&& count($this->request->getUploadedFiles()) == 1 ) {

			$uploaded_photo = $this->request->getUploadedFiles();

			foreach ($uploaded_photo as $file) {

				if ($file->getExtension()    !== "jpeg"
					&& $file->getExtension() !== "jpg"
					&& $file->getExtension() !== "png" ) {

					$this->flashSession->notice("A foto tem de ser do tipo jpeg ou png");
					return $this->response->redirect("/find");
				}


				// guardar a imagem num local do servidor
				$photo_new_name = sha1($uploaded_photo[0]->getName() . microtime())
						 . "." . $uploaded_photo[0]->getExtension();

				$uploaded_photo[0]->moveTo("img/polaroids/" . $photo_new_name );

				// guardar em persistência (entre requests) o nome da imagem
				$this->session->set("photo_name", $photo_new_name);
				// redireccionar para a página /create-polaroid
				// com a photo já no html para poder ser editada
				return $this->response->redirect("/create-polaroid");
			}

		}

		return $this->response->redirect("/");
	}

	/**
	 * @route private
	 *
	 * criar uma polaroid nova associada a um place
	 */
	public function createAction()
	{
		$this->tag->appendTitle(" | PolaroidController - createAction");

		$this->assets
			->collection('footer')
				->addJs("http://feather.aviary.com/imaging/v1/editor.js")
				->addJs("/js/app-polaroid-creation.js");

		if ($this->request->isPost()
			&& $this->request->hasPost("polaroid_location")
			&& $this->security->checkToken()
		) {
			$this->view->disable();

			$image_location = $this->request->getPost("polaroid_location", "string");
			$image = basename($image_location);

//			print_r(pathinfo($this->request->getPost("polaroid_location")));
//			echo "<br>";
//			echo pathinfo($image_location)["dirname"];
//			echo "<br>";

			echo "O nome do ficheiro: ", $image;
			var_dump($this->request->getPost());
			die;


			if(substr($image_location, 0, 4) === "http")
			{
				// fazer download da imagem que foi editada
				$path  = "img/polaroids/";
				$ch    = curl_init($image_location);
				$fp    = fopen($path . $image, 'wb');
				curl_setopt($ch, CURLOPT_FILE, $fp);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				$result = curl_exec($ch);
				curl_close($ch);
				fclose($fp);

				// guardá-la na bd
				$polaroid                       = new Polaroids();
				$polaroid->title                = $this->request->getPost("polaroid_title", "string");
				$polaroid->description          = $this->request->getPost("polaroid_description", "string");
				$polaroid->photo_hash_file_name = $image;
				$polaroid->id_user              = $this->session->get("auth")["id"];

				// remover a original sem efeitos
				$old_image_uploaded = "img/polaroids/" . $this->session->get("photo_name");
				unlink($old_image_uploaded);
				// remover a variável de sessão com o nome da foto original
				$this->session->remove("photo_name");

				// redireccionar para a página show polaroid da imagem guardada
				return $this->response->redirect("/show/#NUMBER_ID#/".
					$this->tag->friendlyTitle($polaroid->title, "-"));
			}else
			{
				// guardá-la na bd
				$polaroid                       = new Polaroids();
				$polaroid->title                = $this->request->getPost("polaroid_title", "string");
				$polaroid->description          = $this->request->getPost("polaroid_description", "string");
				$polaroid->photo_hash_file_name = $this->session->get("photo_name");
				$polaroid->id_user              = $this->session->get("auth")["id"];

				// remover a variável de sessão com o nome da foto original
				$this->session->remove("photo_name");

				// redireccionar para a página show polaroid da imagem guardada
				return $this->response->redirect("/show/#NUMBER_ID#/" .
					$this->tag->friendlyTitle($polaroid->title, "-"));

			}
		}

		//return $this->response->redirect("/");
	}

	public function likeAction()
	{
		$this->view->disable();

		if ($this->request->isPost())
		{
			$polaroid_id        = $this->request->getPost("polaroid_id", "int");
			$polaroid_to_update = Polaroids::findFirst($polaroid_id);
			$polaroid_title     = $polaroid_to_update->title;
			$polaroid_to_update->number_of_likes += 1;

			if ($polaroid_to_update->update() == false)
				$this->flashSession->notice("Something Went Wrong!");
			else
				$this->flashSession->success("Thanks dude! <a href='#' class='close'>&times;</a>");

			return $this->response->redirect("/polaroid/" . $polaroid_id
					. "/" . $this->tag->friendlyTitle($polaroid_title, "-"));

		}

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
			$polaroid_id      = $this->request->getPost('polaroid_id', 'int');
			$polaroid_title   = Polaroids::findFirst($polaroid_id);
			$polaroid_title   = $polaroid_title->title;
			$user_id          = $this->session->get('auth')['id'];

			if (strlen($comment_polaroid) == 0) {
				$this->flashSession->error("Mother Fucker you have to type
				some text!<a href='#' class='close'>&times;</a>");
				return $this->response->redirect("/polaroid/" .
					 $polaroid_id ."/". $this->tag->friendlyTitle($polaroid_title, "-"));
			}

			$polaroid_has_new_comment                          = new PolaroidHasComments();
			$polaroid_has_new_comment->comment                 = $comment_polaroid;
			$polaroid_has_new_comment->id_user                 = $user_id;
			$polaroid_has_new_comment->id_polaroid             = $polaroid_id;
			$polaroid_has_new_comment->comment_number_of_likes = 0;
			$polaroid_has_new_comment->datetime_created        = date('Y-m-d H:i:s');
			$polaroid_has_new_comment->datetime_updated        = date('Y-m-d H:i:s');

			if ($polaroid_has_new_comment->create())
			{
				return $this->response->redirect("/polaroid/" .
					$polaroid_id . "/" . $this->tag->friendlyTitle($polaroid_title, "-"));
			}else
			{
				foreach ($polaroid_has_new_comment->getMessages() as $message)
					$this->flashSession->error($message . "<a href = '#' class='close' >&times;</a >");

				return $this->response->redirect("/polaroid/" .
					$polaroid_id . "/" . $this->tag->friendlyTitle($polaroid_title, "-"));

			}

		}

		return $this->response->redirect("/");
	}


	public function editCommentAction()
	{

	}
}

