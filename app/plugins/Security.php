<?php

use Phalcon\Events\Event,
	Phalcon\Mvc\User\Plugin,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Acl;

/**
 * Security
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class Security extends Plugin
{

	public function __construct($dependencyInjector)
	{
		$this->_dependencyInjector = $dependencyInjector;
	}

	public function getAcl()
	{
		if (!isset($this->persistent->acl)) {

			$acl = new Phalcon\Acl\Adapter\Memory();

			$acl->setDefaultAction(Phalcon\Acl::DENY);

			//Register roles
			$roles = array(
				'users'  => new Phalcon\Acl\Role('Users'),
				'guests' => new Phalcon\Acl\Role('Guests')
			);
			foreach ($roles as $role) {
				$acl->addRole($role);
			}

			//Private area resources
			$privateResources = array(
				'polaroid' => array('index', 'create', 'update', 'delete'),
				'route'    => array('index', 'create', 'update', 'delete'),
				'user'     => array('profile', 'account', 'places', 'routes', 'liked', 'following')
			);
			foreach ($privateResources as $resource => $actions) {
				$acl->addResource(new Phalcon\Acl\Resource($resource), $actions);
			}

			//Public area resources
			$publicResources = array(
				'polaroid-map-app'    => array('index'),
				'index'    => array('index'),
				'find'     => array('index', 'places', 'routes', 'users'),
				'polaroid' => array('show'),
				'route'    => array('show'),
				'session'  => array('index', 'login', 'signUp', 'logout'),
				'user'     => array('index', 'show')
			);
			foreach ($publicResources as $resource => $actions) {
				$acl->addResource(new Phalcon\Acl\Resource($resource), $actions);
			}

			/**
			 * finalmente consegui resolver o problema das permissões
			 *
			 * http://forum.phalconphp.com/discussion/2315/acl-problem
			 *
			 */
			//Grant access to public areas to both users and guests
			foreach ($roles as $role) {
				foreach ($publicResources as $resource => $actions) {
					foreach ($actions as $action){
						$acl->allow($role->getName(), $resource, $action);
					}
				}
			}

			//Grant access to private area to role Users
			foreach ($privateResources as $resource => $actions) {
				foreach ($actions as $action) {
					$acl->allow('Users', $resource, $action);
				}
			}

			//The acl is stored in session, APC would be useful here too
			$this->persistent->acl = $acl;
		}

//		var_dump($this->persistent->acl);
//
//		die;

		return $this->persistent->acl;
	}

	/**
	 * This action is executed before execute any action in the application
	 */
	public function beforeDispatch(Event $event, Dispatcher $dispatcher)
	{
		$auth = $this->session->get('auth');

		if (!$auth) {
			$role = 'Guests';
		} else {
			$role = 'Users';
		}

		$controller = $dispatcher->getControllerName();
		$action     = $dispatcher->getActionName();

		$acl = $this->getAcl();

		$allowed = $acl->isAllowed($role, $controller, $action);

		if ($allowed != Acl::ALLOW) {
			$this->flashSession->error("You don't have access to this module "
				. $controller . " | " . $action );

//			$this->dispatcher->forward(array(
//					'controller' => 'index',
//					'action'     => 'index'
//			));

			$this->response->redirect("/sign-in-up");

			//Returning "false" we tell to the dispatcher to stop the current operation
			return false;
		}

	}

}
