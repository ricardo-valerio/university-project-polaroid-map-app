<?php

	/***********************************************
	 *  ROUTES PÚBLICAS
	 ***********************************************/

	// root route
	$router->add("/", array(

		"controller" => "index",
		"action"     => "index"
	))->setName("root");;

	$router->add("/sign-in-up", array(

		"controller" => "session",
		"action"     => "index"
	));

	$router->add("/sign-up", array(

		"controller" => "session",
		"action"     => "signUp"
	));

	$router->add("/people-online",
		array(
			"controller" => "user",
			"action"     => "index"
		)
	);

	// user/123
	// user/123/rivalerio23
	$router->add("/user/{user_id}/:params",
		array(
			"controller" => "user",
			"action"     => "show",
			"params"     => 1
		)
	);

	$router->add("/api/routes-likes",
		array(
			"controller" => "api",
			"action"     => "routesLikes"
		)
	);

	$router->add("/api/polaroids-likes",
		array(
			"controller" => "api",
			"action"     => "polaroidsLikes"
		)
	);

	/***********************************************
	 *  ROUTES PRIVADAS PARA USERS
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

	$router->add("/create-polaroid", array(

		"controller" => "polaroid",
		"action"     => "create"
	));

	/***********************************************
	 *  ROUTES PRIVADAS PARA ROUTES
	 ***********************************************/

	$router->add("/create-route", array(

		"controller" => "route",
		"action"     => "create"
	));



