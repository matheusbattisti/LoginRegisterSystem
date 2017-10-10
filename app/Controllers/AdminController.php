<?php 

	namespace App\Controllers;

	use Core\Action;

	class AdminController extends Action
	{
		public function index() {
			$this->render('index');
		}

	}
