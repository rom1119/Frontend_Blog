<?php

namespace UserBundle\Model;

use UserBundle\Model\UserModel;

class Authentication implements AuthenticationInterface
{
	private $userModel;
	
	function __construct(UserModel $userModel)
	{
		$this->userModel = $userModel;
		$this->secret = 'secret_key';

	}

	public function login($email, $password)
	{
		if(empty($email) || empty($password)) {
			return 'Wpisz email i hasło';
		}

		$response = array();
		$user = $this->userModel->getUser($email);

		if(!$user) {
			return 'Podałeś nieprawidłowe dane ';
		}
			$isCorrectPass = $this->userModel->isCorrectPassword($user->getPassword(), $password);

		if($isCorrectPass) {

			$payload = array(
				'name' => $user->getName(),
				'secondName' => $user->getSecondName(),
				'username' => $user->getUsername(),
				'role' => $user->getRole(),
				'email' => $user->getEmail(),
				'birthdayDate' => $user->getBirthdayDate(),
				'gender' => $user->getGender(),
				'phone' => $user->getPhone(),
				'avatar' => $user->getAvatar(),
				'description' => $user->getDescription(),
				'website' => $user->getWebsite(),
				'posts' => $user->getPosts(),

				);
			$response['data'] = $payload;
			$response['message'] = 'Zostałeś zalogowany';
			return json_encode($response);
		}

		return 'Podałeś nieprawidłowe dane ';
	}

	public function logout()
	{
		
	}
}