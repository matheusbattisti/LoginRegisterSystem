<?php 

	namespace App\Controllers;

	use Core\Action;

	class IndexController extends Action
	{
		public function index() {
			$this->render('index');
		}
		
		public function login() {
			echo 'login';
		}
	}
