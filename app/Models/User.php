<?php 

	namespace App\Models;

	use Core\Crud;
	use Core\Messages;

	class User extends Crud
	{

		protected $table = "usuarios";

		public function registerUser($data) {

			$emailExists = $this->findByEmail($_POST['email']);

			//checando se as variaveis vieram no post, e se o email ja existe no banco
			if(isset($_POST['email']) && $_POST['email'] != "" && $emailExists == '') {

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

						//caso o usuario registre, limpa as mensagens
						Messages::clearMessage();
						header('Location: /');
					}


				} else {
					Messages::setMessage('warning', 'A senha e a confirmação de senha não estão iguais!');
					header('Location: /');
				}

			} else {
				Messages::setMessage('warning', 'O e-mail não pode ser vazio ou já existe na base de dados!');
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
						//caso o usuario autentique, limpa as mensagens
						Messages::clearMessage();
						header('Location: /');
						
					} else {
						Messages::setMessage('warning', 'Usuário ou senha incorretos!');
						header('Location: /');
					}

				} else {
					Messages::setMessage('warning', 'Usuário ou senha incorretos!');
					header('Location: /');
				}

			} else {
				Messages::setMessage('warning', 'Usuário ou senha incorretos!');
				header('Location: /');
			}
		}
	}