<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\DI\Container;

	class RegisterController extends Action
	{
		public function index() {

			echo 'tela de register';
			
		}

		public function post() {

			$user = Container::getModel("User");
			$user->registerUser($_POST);
			
		}

	}
