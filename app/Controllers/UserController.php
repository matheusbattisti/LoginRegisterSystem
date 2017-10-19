<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\DI\Container;

	class UserController extends Action
	{

		public function index() {
			header('Location: /');
		}

		public function login() {

			$user = Container::getModel("User");
			$user->authenticateUser($_POST);

		}

		public function register() {

			$user = Container::getModel("User");
			$user->registerUser($_POST);
			
		}

		public function logout() {

			$user = Container::getModel("User");
			$user->logout();

		}

	}
