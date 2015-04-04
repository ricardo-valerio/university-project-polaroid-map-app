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
		if ($this->request->hasQuery("country")) {
			$country   = $this->request->getQuery("country", "string");
			// TODO: bind params
			$places = Polaroids::find("country = '$country'");
		}else{
			$places = Polaroids::find(array(
				"order" => "datetime_created DESC"
//				"limit" => 5
			));
		}

		foreach($places as $place) {
		    $data[] = array(
			    'id'           => $place->id,
			    'title'        => $place->title,
			    'lat'          => $place->lat,
			    'lon'          => $place->lon,
			    'description'  => $place->description
		    );
		}

	    echo json_encode($data);
    }

	public function routesAction()
	{
		$routes = Routes::find(array(
			"order" => "datetime_created DESC"
		));

		foreach ($routes as $route) {
			$data[] = array(
				'id'          => $route->id,
				'title'       => $route->title,
				'description' => $route->description
			);
		}

		echo json_encode($data);
	}

	public function polaroidsLikesAction()
	{

		$polaroids = Polaroids::find(array(
				"order" => "number_of_likes DESC"
		));

		foreach ($polaroids as $polaroid) {
			$data[] = array(
				'id'              => $polaroid->id,
				'title'           => $polaroid->title,
				'number_of_likes' => $polaroid->number_of_likes
			);
		}

		echo json_encode($data);
	}

	public function routesLikesAction()
	{
		$routes = Routes::find();

		foreach ($routes as $route) {
			$data[] = array(
				'id'              => $route->id,
				'title'           => $route->title,
				'number_of_likes' => $route->number_of_likes
			);
		}

		echo json_encode($data);
	}


	public function mapAction()
	{
		$places = Polaroids::find(array(
			"group" => "lat_lon_id"
		));

		foreach($places as $place){

			$data[] = array(
				"lat_lon_id" => $place->lat_lon_id,
				"geo_info" => array(
					"lat"     => $place->lat,
					"lon"     => $place->lon,
					"country" => $place->country
				),
				"polaroids" => $this->getPolaroidsOfGivenLatLongId($place->lat_lon_id)
			);

		}

		echo json_encode($data);
	}

	/**
	 * @return array com os places das photos relativamente
	 * à lat_lon_id passada como argumento
	 */
	private function getPolaroidsOfGivenLatLongId($id)
	{
		$pl = Polaroids::find(array(
			"conditions" => "lat_lon_id = '$id'",
			"order"      => "datetime_created DESC"
		));

		foreach ( $pl as $p) {
			$array[] = array(
				"id"                   => $p->id,
				"title"                => $p->title,
				"polaroid_description" => $p->description,
				"polaroid_image"       => $p->photo_hash_file_name,
				"datetime_created"     => $p->datetime_created
			);
		}
		return $array;
	}

	public function testsAction()
	{

	}
}

