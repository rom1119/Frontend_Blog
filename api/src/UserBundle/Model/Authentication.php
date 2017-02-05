<?php

namespace UserBundle\Model;

use UserBundle\Model\UserModel;
use Firebase\JWT\JWT;

class Authentication implements AuthenticationInterface
{
	private $userModel;
	
	function __construct(UserModel $userModel)
	{
		$this->userModel = $userModel;
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
			$key = 'secret_key';
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
				'posts' => $user->getPosts()
				);
			$token = JWT::encode($payload, $key, 'HS512');
			$response['token'] = $token;
			$response['message'] = 'Zostałeś zalogowany';
			return json_encode($response);
		}

		return 'Podałeś nieprawidłowe dane ';
	}

	public function isValidToken($token)
	{
		$key = 'secret_key';
		try {
			return is_object(JWT::decode($token, $key, array('HS512')));
		} catch (\Exception $e) {
			return false;
		}
		
	}
}