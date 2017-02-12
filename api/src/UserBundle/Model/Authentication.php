<?php

namespace UserBundle\Model;

use UserBundle\Model\UserModel;
use UserBundle\Security\Providers\UserProvider;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider;
use Symfony\Component\Security\Core\User\UserChecker;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

//use UserBundle\Listeners\AuthenticationListener;

class Authentication implements AuthenticationInterface
{
	private $userModel;

	private $em;
	
	function __construct(UserModel $userModel, $em)
	{
		$this->userModel = $userModel;
		$this->secret = 'secret_key';
		$this->em = $em;


	}

	public function login($email, $password)
	{
		if(empty($email) || empty($password)) {
			return 'Wpisz email i hasło';
		}

		$response = array();
		$user = $this->userModel->getUser($email);

		if(!$user) {
			return 'Podałeś nieprawidłowe dane 111';
		}
			$isCorrectPass = $this->userModel->isCorrectPassword($user->getPassword(), $password);

		if($isCorrectPass) {

			$payload = array(
				'name' => $user->getName(),
				'secondName' => $user->getSecondName(),
				'username' => $user->getUsername(),
				'role' => $user->getRoles(),
				'email' => $user->getEmail(),
				'birthdayDate' => $user->getBirthdayDate(),
				'gender' => $user->getGender(),
				'phone' => $user->getPhone(),
				'avatar' => $user->getAvatar(),
				'description' => $user->getDescription(),
				'website' => $user->getWebsite(),
				'posts' => $user->getPosts(),
				'apiKey' => $user->getApiKey()

				);

			// $providers = array(new UserProvider($this->em));

			// //$listener = new AuthenticationListener(new AuthenticationProviderManager($providers))

			// $authenticationManager = new AuthenticationProviderManager($providers);

			// $unauthenticatedToken = new UsernamePasswordToken(
   //        $user->getUsername(),
   //        $user->getPassword(),
   //        'secured_area'
   //    );

   //    $authenticatedToken = 
   //        $authenticationManager
   //        ->authenticate($unauthenticatedToken);
   //    $token = new TokenStorage();
   //    $token->setToken($authenticatedToken);

   //    $userProvider = new InMemoryUserProvider(
			//   array(
			//       'admin' => array(
			//           // password is "foo"
			//           'password' => $user->getPassword(),
			//           'roles'    => array($user->getRoles()),
			//       ),
			//   )
			// );

			// for some extra checks: is account enabled, locked, expired, etc.?
			// $userChecker = new UserChecker();

			// // an array of password encoders (see below)
			// $encoderFactory = new EncoderFactory(...);

			// $provider = new DaoAuthenticationProvider(
			//   $userProvider,
			//   $userChecker,
			//   'our_db_provider',
			//   $encoderFactory
			// );

			// $provider->authenticate($unauthenticatedToken);

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