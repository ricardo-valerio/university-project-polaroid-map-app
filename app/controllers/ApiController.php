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
			$places = Places::find("country = '$country'");
		}else{
			$places = Places::find(array(
				"order" => "datetime_added DESC"
//				"limit" => 5
			));
		}

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

		foreach ($polaroids as $polaroid) {
			$data[] = array(
				'id'              => $polaroid->id,
				'polaroid'        => $polaroid->polaroid,
				'number_of_likes' => $polaroid->number_of_likes
			);
		}

		echo json_encode($data);
	}

	public function mapAction()
	{
		$places = Places::find(array(
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
				"photo_places" => $this->getPhotoPlacesOfGivenLatLongId($place->lat_lon_id)
			);

		}

		echo json_encode($data);
	}

	/**
	 * @return array com os places das photos relativamente
	 * à lat_lon_id passada como argumento
	 */
	private function getPhotoPlacesOfGivenLatLongId($id)
	{
		foreach (Places::find("lat_lon_id = '$id'") as $p) {
			$array[] = array(
				"id"                => $p->id,
				"place"             => $p->place,
				"place_image"       => $p->image_hash,
				"place_description" => $p->description,
				"datetime_create"   => $p->datetime_added
			);
		}
		return $array;
	}
}

