<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\Session;

	class AdminController extends Action
	{

		public function __construct() {
			Session::checkSessionId();
		}

		public function index() {
			$this->render('index');
		}

	}
