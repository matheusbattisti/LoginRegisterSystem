<?php 

	namespace Core;

	use Core\Init;

	class Route extends Init
	{
		protected function initRoutes() {
			$routes['home'] = array('route'=>'/', 'controller'=>'IndexController', 'action'=>'index');
			$routes['login'] = array('route'=>'/login', 'controller'=>'IndexController', 'action'=>'login');
			$routes['admin'] = array('route'=>'/admin', 'controller'=>'AdminController', 'action'=>'index');
			$this->setRoutes($routes);
		}
	}


 ?>