<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Files as SessionAdapter;


error_reporting(E_ALL);

try {

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * We register the events manager
 */
$di->set('dispatcher', function () use ($di) {

	$eventsManager = $di->getShared('eventsManager');

	$security = new Security($di);

	/**
	 * We listen for events in the dispatcher using the Security plugin
	 */
	$eventsManager->attach('dispatch', $security);

	$dispatcher = new Phalcon\Mvc\Dispatcher();
	$dispatcher->setEventsManager($eventsManager);

	return $dispatcher;

});

/**
 * Load router from external file
 */
$di->set('router', function () {

	$router = new Phalcon\Mvc\Router();
	$router->removeExtraSlashes(true);

	require 'routes.php';

	// Use $_SERVER['REQUEST_URI'] (NGINX)
	if (!isset($_GET['_url'])) {
		$router->setUriSource(Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI);
	}

	return $router;
});

	/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath'      => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter(array(
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        "charset"  => $config->database->charset
    ));
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () use ($config) {
	if (isset($config->models->metadata)) {
		$metaDataConfig  = $config->models->metadata;
		$metadataAdapter = 'Phalcon\Mvc\Model\Metadata\\' . $metaDataConfig->adapter;

		return new $metadataAdapter();
	}

	return new Phalcon\Mvc\Model\Metadata\Memory();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});


/**
 * Register the flash service with custom CSS classes
 */
$di->set('flash', function () {
	return new Phalcon\Flash\Direct(array(
		'error'   => 'alert-box alert radius',
		'success' => 'alert-box success radius',
		'notice'  => 'alert-box info radius'
	));
});

/**
 * Registar o flashSession para poder guardar flash messagens entre requests
 */
$di->set('flashSession', function () {
	return new \Phalcon\Flash\Session(array(
     'error'   => 'row alert-box alert radius',
     'success' => 'row alert-box success radius',
     'notice'  => 'row alert-box info radius'
 ));
});

/**
 * Harden the password hashing
 *
 * http://phalcontip.com/discussion/24/harden-the-password-hashing
 */
$di->set('security', function () {
	$security = new Phalcon\Security();
	$security->setWorkFactor(13);
	// $security->setDefaultHash(Phalcon\Security::CRYPT_BLOWFISH_Y);

	return $security;
});

} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e){
	echo $e->getMessage();
}
