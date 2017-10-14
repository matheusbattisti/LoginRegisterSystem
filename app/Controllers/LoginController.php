<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\DI\Container;

	class LoginController extends Action
	{
		public function index() {
			echo 'teste';
		}

		public function post() {

			$user = Container::getModel("User");
			$user->authenticateUser($_POST);

		}

	}
