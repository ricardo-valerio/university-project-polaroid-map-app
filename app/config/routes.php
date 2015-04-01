<?php

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

	$router->add("/sign-up", array(

		"controller" => "session",
		"action"     => "signUp"
	));

	$router->add("/find", array(

		"controller" => "find",
		"action"     => "index"
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

	$router->add("/i-am-following", array(

		"controller" => "user",
		"action"     => "following"
	));

	$router->add("/i-liked", array(

		"controller" => "user",
		"action"     => "liked"
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



