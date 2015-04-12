<?php

class AjaxController extends ControllerBase
{

	/**
	 * @route private
	 */
	public function indexAction()
    {

//	    $users = Users::find(array(
//		    "conditions" => "name LIKE '%" . $this->request->getQuery("q", "string") . "%'"
//	    ));

    }


	public function searchBarAction()
	{
		$this->view->disable();

		if (!$this->request->hasPost("q"))
		{
			exit("erro");
		}else
		{
			$q = trim($this->request->getPost("q", "string"));

			if (!empty($q))
			{
				$polaroids = Polaroids::find(array(
					"conditions" => "title LIKE '%" . $q . "%'",
					"limit"      => 3
				));


				if (count($polaroids) > 0)
				{
					foreach ($polaroids as $polaroid)
					{
						?>
						<li class="li1">
							<a href="polaroid/<?php echo $polaroid->id, "/",
							$this->tag->friendlyTitle($polaroid->title, "-"); ?>" class="a1">
			                <span class="span1">
				                <img class="img1"
				                     src="public/img/polaroids/<?php echo
				                     $polaroid->photo_hash_file_name;?>">
				                <span class="span2">
				                        <span class="span3">
				                            <span
					                            class="span4"><?php echo
					                            $polaroid->title; ?></span>
				                            <span class="span5">
					                        <span
						                        class="span7"><?php echo
						                        $polaroid->country; ?></span>
				                        </span>
				                      </span>
				                </span>
			                </span>
							</a>
						</li>
					<?php
					}
				}


				$routes = Routes::find(array(
					"conditions" => "title LIKE '%" . $q . "%'",
					"limit"      => 3
				));


				if (count($routes) > 0) {
					foreach ($routes as $route) {
						?>
						<li class="li1">
							<a href="route/<?php echo $route->id, "/",
							$this->tag->friendlyTitle($route->title, "-"); ?>"
							   class="a1">
			                <span class="span1">
				                <img class="img1"
				                     src="http://images.clipartpanda.com/location-icon-map-places_network_my_google_plates-512.png">
				                <span class="span2">
				                        <span class="span3">
				                            <span
					                            class="span4"><?php echo $route->title; ?></span>
				                            <span class="span5">
					                        <span
						                        class="span7"><?php echo
						                        $route->number_of_likes;?></span>
				                        </span>
				                      </span>
				                </span>
			                </span>
							</a>
						</li>
					<?php
					}

				}

				$users = Users::find(array(
					"conditions" => "full_name LIKE '%" . $q . "%'",
					"limit"      => 3
				));


				if (count($users) > 0) {
					foreach ($users as $user) {
						?>
						<li class="li1">
							<a href="user/<?php echo $user->id, "/",
							$this->tag->friendlyTitle($user->full_name, "-"); ?>"
							   class="a1">
			                <span class="span1">
				                <img class="img1"
				                     src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($user->email)));?>">
				                <span class="span2">
				                        <span class="span3">
				                            <span
					                            class="span4"><?php echo $user->full_name; ?></span>
				                            <span class="span5">
					                        <span
						                        class="span7"><?php echo $user->country; ?></span>
				                        </span>
				                      </span>
				                </span>
			                </span>
							</a>
						</li>
					<?php
					}
				}

			}
		}
	}


	public function anotherAction()
	{

	}
}

?>
