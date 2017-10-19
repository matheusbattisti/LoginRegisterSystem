<?php 

	namespace Core;

	use Core\Init;

	class Route extends Init
	{
		protected function initRoutes() {
			$routes['home'] = array('route'=>'/', 'controller'=>'IndexController', 'action'=>'index');
			$routes['login'] = array('route'=>'/user/login', 'controller'=>'UserController', 'action'=>'login');
			$routes['register'] = array('route'=>'/user/register', 'controller'=>'UserController', 'action'=>'register');
			$routes['admin'] = array('route'=>'/admin', 'controller'=>'AdminController', 'action'=>'index');
			$routes['logout'] = array('route'=>'/logout', 'controller'=>'UserController', 'action'=>'logout');
			$this->setRoutes($routes);
		}
	}


 ?>