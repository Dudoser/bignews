<?php
	
	namespace app\controllers;

	use app\models\User;


	Class AuthController extends AppController 
	{
		public function indexAction ()
		{
			$title = "Страница авторизации";
			$this->set(compact('title'));
		}

		public function handlerAction ()
		{
			// session_start();
			$user = new User;

			$error = 'что-то пошло не так';
			$errorForEmail = 'email не должен быть пустым!';
			$errorForPassword = 'пароль не должен быть пустым!';
			$errorPassword = 'пароль не может быть короче 4-х симаолов';
			$errorUser = 'Пользователь с таким e-mail уже существует';
			$errorWriteEmail = 'Вы ввели не верный e-mail, либо такого пользователя не существует';
			$errorWritePass = 'Вы ввели не верный пароль, либо такого пользователя не существует';


			if (isset($_POST['done-auth']) || isset($_POST['done-reg'])) {
				$email = SignValig($_POST['email'], $errorForEmail);
				$pass = SignValig($_POST['password'], $errorForPassword);
				
			}
			if (!isset($_SESSION['empty_row']))
			{
				if (isset($_POST['done-auth']))
				{
					$this->view = 'index';
					// $findUser = $user->findBySql("SELECT * FROM user WHERE email = '$email' AND password = '$pass'");

					$findUser = $user->findOne($email, 'email');

					if (!empty($findUser)) {
						if ($findUser[0]['password'] != $pass) {
							$_SESSION['empty_row'] = $errorWritePass;
						}
						else
						{
							$_SESSION['user_id'] = $findUser[0]['id'];	
							$_SESSION['name'] = $findUser[0]['name'];	
							$_SESSION['email'] = $findUser[0]['email'];	
							$_SESSION['image'] = $findUser[0]['image'];
						}
					}
					else
					{
						$_SESSION['empty_row'] = $errorWriteEmail;
					}

					$redirect = youRedirect('/main/index/');

				}
				if (isset($_POST['done-reg'])) 
				{
					$this->view = 'index';

					
					$signUser = $user->findOne($email, 'email');

					if (empty($signUser))
					{
						$lastUser = $user->findBySql("SELECT id FROM user ORDER BY id DESC LIMIT 1");
						$lastUser = $lastUser[0]['id'] + 1;
						$name = 'user-' . $lastUser;

						$regUser = $user->findBySql("INSERT INTO user (id, name, email, password, image) VALUES (NULL, '$name', '$email', '$pass', 'no-image.png')");

						if (!empty($regUser)) 
						{
							$_SESSION['user_id'] = $lastUser;	
							$_SESSION['name'] = $name;	
							$_SESSION['email'] = $email;	
							$_SESSION['image'] = 'no-image.png';	
							$_SESSION['reg'] = 'Спасибо за регистрацию, перейдите пожалуйста в ваш кабинет для настройки профиля =)';	

							$redirect = youRedirect('/main/index/');
						}
						else
						{
							$_SESSION['empty_row'] = $error;
						}
					}
					else
					{
						$_SESSION['empty_row'] = $errorUser;
					}

				}
			}
		}

		public function exitAction ()
		{
			session_destroy();
			$redirect = youRedirect('/main/index/');
		}
	}


?>