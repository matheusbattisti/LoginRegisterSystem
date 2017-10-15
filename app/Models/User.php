<?php 

	namespace App\Models;

	//incluindo arquivo com constantes
	include_once '../config/Constants.php';

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
						'senha' => password_hash($userPass, PASSWORD_DEFAULT, ['cost' => 12])
					];

					$response = $this->insert($data);

					if($response == true) {
						header('Location: /');
					}


				} else {
					header('Location: /');
				}

			} else {
				header('Location: /');
			}

		}

		public function authenticateUser($data) {
			
			//checando se as variaveis vieram no post
			if(isset($_POST['email']) && $_POST['email'] != "") {

				$userEmail = $_POST['email'];
				$userPass = $_POST['password'];

				$userData = $this->findByEmail($userEmail);

				if($userData != '') {

					$checked = password_verify($userPass, $userData['senha']);

					if($checked) {
						echo 'parabens está logado';
					} else {
						header('Location: /');
					}

				} else {
					header('Location: /');
				}

			} else {
				header('Location: /');
			}
		}
	}