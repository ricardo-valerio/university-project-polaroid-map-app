<?php

	$router = new Phalcon\Mvc\Router();

	/***********************************************
	 *  ROUTES PÚBLICAS
	 ***********************************************/

	$router->add("/find/:params", array(

		"controller" => "find",
		"action"     => "index",
		"params"     => 1

	));

	$router->add("/find/:action/:params", array(

			"controller" => "find",
			/**
			 * actions definidas no findController:
			 *
			 * places, routes, users   - no mínimo são estas 3
			 */
			"action"     => 2,
			"params"     => 3
		)
	);


	/***********************************************
	 *  ROUTES PRIVADAS PARA OS USERS
	 ***********************************************/

	$router->add("/profile", array(

		"controller" => "user",
		"action"     => "profile"
	));

	/***********************************************
	 *  ROUTES PRIVADAS PARA POLAROIDS E ROUTES
	 ***********************************************/

	$router->add("/create", array(

		"controller" => "polaroid",
		"action"     => "create"
	));



