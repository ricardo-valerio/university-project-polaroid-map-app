<?php

	$router = new Phalcon\Mvc\Router();

	/***********************************************
	 *  ROUTES PÚBLICAS
	 ***********************************************/

	// root
	$router->add("/", array(

		"controller" => "index",
		"action"     => "index"
	));

	$router->add("/sign-in-up", array(

		"controller" => "session",
		"action"     => "index"
	));

	$router->add("/login", array(

		"controller" => "session",
		"action"     => "login"
	));

	$router->add("/sign-up", array(

		"controller" => "session",
		"action"     => "signUp"
	));


	// Exemplos:
	//            /find/places
	//            /find/routes
	//            /find/users

	$router->add("/find/:action", array(

		"controller" => "find",
		"action"     => 2
	));

	// Exemplos:
	//            /find/places/<country>
	//            /find/places/<city>
	//            /find/places/<user-name>

	//            /find/routes/<country>
	//            /find/routes/<city>
	//            /find/routes/<user-name>

	//            /find/users/<country>
	//            /find/users/<city>

	$router->add("/find/:action/:params", array(

			"controller" => "find",
			"action"     => 2,
			"params"     => 3
	));



	/***********************************************
	 *  ROUTES PRIVADAS PARA OS USERS
	 ***********************************************/

	$router->add("/my-profile", array(

		"controller" => "user",
		"action"     => "profile"
	));

	$router->add("/my-account", array(

		"controller" => "user",
		"action"     => "account"
	));

	$router->add("/my-places", array(

		"controller" => "user",
		"action"     => "places"
	));

	$router->add("/my-routes", array(

		"controller" => "user",
		"action"     => "routes"
	));

	$router->add("/logout", array(

		"controller" => "session",
		"action"     => "logout"
	));


	/***********************************************
	 *  ROUTES PRIVADAS PARA POLAROIDS
	 ***********************************************/

	$router->add("/create/polaroid", array(

		"controller" => "polaroid",
		"action"     => "create"
	));

	/***********************************************
	 *  ROUTES PRIVADAS PARA  ROUTES
	 ***********************************************/

	$router->add("/create/route", array(

		"controller" => "route",
		"action"     => "create"
	));



