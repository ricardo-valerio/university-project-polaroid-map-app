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

	$router->add("/logout", array(

		"controller" => "session",
		"action"     => "logout"
	));

	$router->add("/people-online", array(

		"controller" => "user",
		"action"     => "index"
	));

	$router->add("/find-users/:params", array(

		"controller" => "find",
		"action"     => "allUsers",
		"params"     => 1
	));

	$router->add("/find-polaroids/:params", array(

		"controller" => "find",
		"action"     => "allPolaroids",
		"params"     => 1
	));

	$router->add("/find-routes/:params", array(

		"controller" => "find",
		"action"     => "allRoutes",
		"params"     => 1
	));

	$router->add("/upload-photo", array(

		"controller" => "polaroid",
		"action"     => "upload"
	));

	// user/123
	// user/123/rivalerio23
	$router->add("/user/{user_id}/:params", array(

		"controller" => "user",
		"action"     => "show",
		"params"     => 1
	));

	// polaroid/123
	// polaroid/123/san-francisco-trip
	$router->add("/polaroid/{polaroid_id}/:params", array(

		"controller" => "polaroid",
		"action"     => "show",
		"params"     => 1
	));

	$router->add("/like-polaroid", array(

		"controller" => "polaroid",
		"action"     => "like"
	));

	$router->add("/unlike-polaroid", array(

		"controller" => "polaroid",
		"action"     => "unlike"
	));

	// route/123
	// route/123/route-in-san-francisco
	$router->add("/route/{route_id}/:params", array(

		"controller" => "route",
		"action"     => "show",
		"params"     => 1
	));

	$router->add("/api/routes-likes", array(

		"controller" => "api",
		"action"     => "routesLikes"
	));

	$router->add("/api/polaroids-likes", array(

		"controller" => "api",
		"action"     => "polaroidsLikes"
	));

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

	$router->add("/my-polaroids", array(

		"controller" => "user",
		"action"     => "polaroids"
	));

	$router->add("/my-routes", array(

		"controller" => "user",
		"action"     => "routes"
	));

	$router->add("/i-am-following", array(

		"controller" => "user",
		"action"     => "following"
	));

	$router->add("/follow-user", array(

		"controller" => "user",
		"action"     => "follow"
	));

	$router->add("/unfollow-user", array(

		"controller" => "user",
		"action"     => "unfollow"
	));

	$router->add("/i-liked", array(

		"controller" => "user",
		"action"     => "liked"
	));

	$router->add("/personal-info", array(

		"controller" => "user",
		"action"     => "personalInfo"
	));

	$router->add("/account-settings", array(

		"controller" => "user",
		"action"     => "accountSettings"
	));

	$router->add("/danger-zone", array(

		"controller" => "user",
		"action"     => "dangerZone"
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



