<?php 

	namespace App\Models;

	use Core\Crud;

	class User extends Crud
	{

		protected $table = "usuarios";

		public function registerUser($data) {

			//checando se as variaveis vieram no post
			if(isset($_POST['email']) && $_POST['email'] != "") {

				$userName = $_POST['name'];
				$userEmail = $_POST['email'];
				$userPass = $_POST['password'];
				$userConfirmPass = $_POST['confirmpassword'];

				//checando se a senha e a confirmação são iguais
				if($userPass == $userConfirmPass && $userPass != '') {
					
					$data = [
						'email' => $userEmail,
						'nome'  => $userName,
						'senha' => $userPass
					];

					$this->insert($data);

				} else {
					header('Location: /');
				}

			} else {
				header('Location: /');
			}

		}
	}