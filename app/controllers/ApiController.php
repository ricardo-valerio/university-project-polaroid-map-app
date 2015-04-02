<?php

class ApiController extends ControllerBase
{
	public function initialize()
	{
		$this->view->disable();
		$this->response->setContentType('application/json', 'UTF-8');
	}
	/**
	 * @route private
	 */
	public function placesAction()
    {
	    
//	    $users = Users::find(array(
//		    "conditions" => "name LIKE '%" . $this->request->getQuery("q", "string") . "%'"
//	    ));

		if ($this->request->hasQuery("country")) {
			$country   = $this->request->getQuery("country", "string");
			// TODO: bind params
			$places = Places::find("country = '$country'");
		}else{
			$places = Places::find(array(
				"order" => "datetime_added DESC",
				"limit" => 5
			));
		}

		$data = array();
	    
		foreach($places as $place) {
		    $data[] = array(
			    'place'  => $place->place,
			    'lat'    => $place->lat,
			    'lon'    => $place->lon
		    );
		}

	    echo json_encode($data);
    }

	public function routesAction()
	{

		$routes = Routes::find();

		$data = array();

		foreach ($routes as $route) {
			$data[] = array(
				'id'    => $route->id,
				'route' => $route->route
			);
		}

		echo json_encode($data);
	}

	public function likesAction()
	{
		$polaroids = Polaroid::find();

		$data = array();

		foreach ($polaroids as $polaroid) {
			$data[] = array(
				'id'              => $polaroid->id,
				'polaroid'        => $polaroid->polaroid,
				'number_of_likes' => $polaroid->number_of_likes
			);
		}

		echo json_encode($data);
	}
}

