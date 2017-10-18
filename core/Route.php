<?php 

	namespace Core;

	use Core\Init;

	class Route extends Init
	{
		protected function initRoutes() {
			$routes['home'] = array('route'=>'/', 'controller'=>'IndexController', 'action'=>'index');
			$routes['loginpost'] = array('route'=>'/login/post', 'controller'=>'LoginController', 'action'=>'post');
			$routes['registerpost'] = array('route'=>'/register/post', 'controller'=>'RegisterController', 'action'=>'post');
			$routes['admin'] = array('route'=>'/admin', 'controller'=>'AdminController', 'action'=>'index');
			$routes['logout'] = array('route'=>'/logout', 'controller'=>'UserController', 'action'=>'logout');
			$this->setRoutes($routes);
		}
	}


 ?>