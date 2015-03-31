<?php

class ApiController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
	    $this->view->disable();

	    $this->response->setContentType('application/json', 'UTF-8');

	    $data = array();

	    $users = Users::find(array(
		    "conditions" => "name LIKE '%" . $this->request->getQuery("q", "string") . "%'"
	    ));

	    foreach($users as $user) {
		    $data[] = array(
			    'value'    => $user->name,
			    'location' => $user->location,
			    'avatar'   => $user->avatar
		    );
		}

	    echo json_encode($data);
    }

}

