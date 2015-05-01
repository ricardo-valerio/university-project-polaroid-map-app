<?php

class PolaroidController extends ControllerBase
{

	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateAfter("show-layout");
	}

	public function afterExecuteRoute($dispatcher)
	{
		// Executed after every found action
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
	 */
	public function showAction()
	{
		$this->tag->appendTitle(" | PolaroidController - showAction");

		$this->assets
			->collection('header_css')
				->addCss("http://fonts.googleapis.com/css?family=Reenie+Beanie", FALSE);

		$this->assets
			->collection('header')
				->addJs("http://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true", FALSE);

		$this->assets
			->collection('footer')
				->addJs("/js/app-toggle-map-show-polaroid.js")
				->addJs("/js/app-search-bar.js");


		$polaroid_id = $this->dispatcher->getParam("polaroid_id", "int");

		if ($polaroid_id != NULL)
		{
			if ($this->session->has("auth")) {
				$user_likes_polaroid_or_not = UserLikesPolaroid::count("id_polaroid = $polaroid_id AND id_user = " . $this->session->get('auth')['id']);
			}

			return $this->view->setVars(array(
				"polaroid_info"   => Polaroids::findFirst($polaroid_id),
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
				)),
				"user_likes_polaroid_or_not" => $user_likes_polaroid_or_not
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
			&& $this->request->hasFiles()
			&& count($this->request->getUploadedFiles()) == 1 ) {

			$uploaded_photo = $this->request->getUploadedFiles();

			foreach ($uploaded_photo as $file) {

				if ($file->getExtension()    !== "jpeg"
					&& $file->getExtension() !== "jpg"
					&& $file->getExtension() !== "png" ) {

					return $this->response->redirect("/");
				}


				// guardar a imagem num local do servidor
				$photo_new_name = sha1($uploaded_photo[0]->getName() . microtime())
						 . "." . $uploaded_photo[0]->getExtension();

				$uploaded_photo[0]->moveTo("img/polaroids/" . $photo_new_name);

				// guardar em persistência (entre requests) o nome da imagem
				if ($this->session->has("photo_name")) {
					$old_image_uploaded = "img/polaroids/" . $this->session->get("photo_name");
					unlink($old_image_uploaded);
				}
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


		if(!$this->session->has("photo_name"))
			$this->response->redirect("/");

		$this->assets
			->collection('header')
				->addJs("https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places", FALSE);

		$this->assets
			->collection('footer')
				->addJs("http://feather.aviary.com/imaging/v1/editor.js")
				->addJs("/js/app-polaroid-creation.js")
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


		if ($this->request->isPost()
			&& $this->request->hasPost("polaroid_location")
			&& $this->request->hasPost("polaroid_title")
			&& $this->request->hasPost("polaroid_description")
			&& $this->request->hasPost("lat_lon_id")
			&& $this->request->hasPost("lat")
			&& $this->request->hasPost("lon")
			&& $this->request->hasPost("polaroid_country")
		) {
			$this->view->disable();

			$image_location = $this->request->getPost("polaroid_location", "string");
			$image = basename($image_location);

			// verifica se a imagem vem do plugin da adobe
			if(substr($image_location, 0, 4) === "http")
			{

				// fazer download da imagem que foi editada
				$path = "img/polaroids/";
				$ch   = curl_init($image_location);
				$fp   = fopen($path . $image, 'wb');
				curl_setopt($ch, CURLOPT_FILE, $fp);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_exec($ch);
				curl_close($ch);
				fclose($fp);

				// guardá-la na bd
				$polaroid                       = new Polaroids();
				$polaroid->lat_lon_id           = $this->request->getPost("lat_lon_id", "string");
				$polaroid->lat                  = $this->request->getPost("lat", "float");
				$polaroid->lon                  = $this->request->getPost("lon", "float");
				$polaroid->title                = $this->request->getPost("polaroid_title", array("striptags", "string"));
				$polaroid->description          = $this->request->getPost("polaroid_description", array("striptags", "string"));
				$polaroid->photo_hash_file_name = $image;
				$polaroid->country              = $this->request->getPost("polaroid_country", "string");
				$polaroid->id_user              = $this->session->get("auth")["id"];
				$polaroid->number_of_likes      = 0;
				$polaroid->datetime_created     = date('Y-m-d H:i:s');
				$polaroid->datetime_updated     = date('Y-m-d H:i:s');


				if ($polaroid->save()) {
					// remover a original sem efeitos
					$old_image_uploaded = "img/polaroids/" . $this->session->get("photo_name");
					unlink($old_image_uploaded);
					// remover a variável de sessão com o nome da foto original
					$this->session->remove("photo_name");

					// redireccionar para a página show polaroid da imagem guardada
					return $this->response->redirect("/polaroid/". $polaroid->id ."/".
						$this->tag->friendlyTitle($polaroid->title, "-"));
				}else{
					foreach ($polaroid->getMessages() as $message)
					$this->flashSession->error($message . "<a href = '#' class='close' >&times;</a >");

					return $this->response->redirect("/create-polaroid");
				}

			}else
			{
				// guardá-la na bd
				$polaroid                       = new Polaroids();
				$polaroid->lat_lon_id           = $this->request->getPost("lat_lon_id", "string");
				$polaroid->lat                  = $this->request->getPost("lat", "float");
				$polaroid->lon                  = $this->request->getPost("lon", "float");
				$polaroid->title                = $this->request->getPost("polaroid_title", array("striptags", "string"));
				$polaroid->description          = $this->request->getPost("polaroid_description", array("striptags", "string"));
				$polaroid->photo_hash_file_name = $this->session->get("photo_name");
				$polaroid->country              = $this->request->getPost("polaroid_country", "string");
				$polaroid->id_user              = $this->session->get("auth")["id"];
				$polaroid->number_of_likes      = 0;
				$polaroid->datetime_created     = date('Y-m-d H:i:s');
				$polaroid->datetime_updated     = date('Y-m-d H:i:s');

				if ($polaroid->save()) {
					// remover a variável de sessão com o nome da foto original
					$this->session->remove("photo_name");

					// redireccionar para a página show polaroid da imagem guardada
					return $this->response->redirect("/polaroid/" . $polaroid->id . "/" .
						$this->tag->friendlyTitle($polaroid->title, "-"));
				}else{
					foreach ($polaroid->getMessages() as $message)
						$this->flashSession->error($message . "<a href = '#' class='close' >&times;</a >");

					return $this->response->redirect("/create-polaroid");
				}

			}
		}
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

			if (!$polaroid_to_update->update()){
				$this->flashSession->notice("Ultra Bug - Call Rv!");
			}
			else{
				$user_likes_polaroids = new UserLikesPolaroid();
				$user_likes_polaroids->id_polaroid = $polaroid_id;
				$user_likes_polaroids->id_user     = $this->session->get("auth")["id"];

				if (!$user_likes_polaroids->save()) {
					$this->flashSession->notice("Ultra Bug - Call Rv!");
				}else{
					$this->flashSession->success("Liked! =) <a href='#' class='close'>&times;</a>");
				}
			}

			return $this->response->redirect("/polaroid/" . $polaroid_id
					. "/" . $this->tag->friendlyTitle($polaroid_title, "-"));

		}

	}

	public function unlikeAction()
	{
		$this->view->disable();

				if ($this->request->isPost())
		{
			$polaroid_id        = $this->request->getPost("polaroid_id", "int");
			$polaroid_to_update = Polaroids::findFirst($polaroid_id);
			$polaroid_title     = $polaroid_to_update->title;
			$polaroid_to_update->number_of_likes -= 1;

			if (!$polaroid_to_update->update()){
				$this->flashSession->notice("Ultra Bug - Call Rv!");
			}
			else{
				$user_likes_polaroid = UserLikesPolaroid::findFirst("id_polaroid = $polaroid_id
					AND id_user = ". $this->session->get("auth")["id"]);

				if (!$user_likes_polaroid->delete()) {
					$this->flashSession->notice("Ultra Bug - Call Rv!");
				}else{
					$this->flashSession->notice("Unliked! =( <a href='#' class='close'>&times;</a>");
				}
			}

			return $this->response->redirect("/polaroid/" . $polaroid_id
					. "/" . $this->tag->friendlyTitle($polaroid_title, "-"));

		}
	}

}

