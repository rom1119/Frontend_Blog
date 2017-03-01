<?php

namespace UserBundle\Model;

use UserBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Validator\RecursiveValidator;
use Symfony\Component\Security\Core\User\UserInterface;

class UserManager  implements UserManagerInterface
{
	private $dbManager;
	private $dbRepository;
	private $encoder;
	private $validator;

	public function __construct(EntityManager $em, RecursiveValidator $validator, UserPasswordEncoder $encoder)
	{
		$this->dbManager = $em;
		$this->dbRepository = $em->getRepository('UserBundle:User');
		$this->encoder = $encoder;
		$this->validator = $validator;
	}

	public function formValidate($data)
	{
		if(empty($data->get('username')) || empty($data->get('pass_first')) || empty($data->get('email'))) {
			return 'Musisz wypełnic obowiązkowe pola';
		}
		if($data->get('pass_first') !== $data->get('pass_conf')) {
			return 'Hasła muszą być takie same';
		}

		return true;
		
	}

	public function userValidate($user, $data)
	{
		$errors = $this->validator->validate($user);

		if($this->existUser($data->get('username'), $data->get('email'))) {
			return "Taki użytkownik już istnieje";
		}

    if (count($errors) > 0) {
        /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
        $errorsString =  $errors;

        return $errorsString[0]->getMessage();
    }

    return true;
	}

	public function createUser($data)
	{
		$user = new User();
		// if(!is_object(@\DateTime::createFromFormat("d-m-y", '01-02-1990'))) {
		// 	return "wpowadzono niepoprawną date";
		// }
		//$user->setBirthdayDate(new \DateTime($data->get('birthday_date')));

		$user->setName($data->get('name'));
		$user->setSecondName($data->get('secondname'));
		$user->setUsername($data->get('username'));
		$user->setUsernameCanonical($data->get('username'));
		$user->setEnabled(true);
		$user->setGender($data->get('gender'));
		$user->setPhone($data->get('phone'));
		$user->setEmail($data->get('email'));
		$user->setEmailCanonical($data->get('email'));
		$user->setSuperAdmin(true);
		//$user->setAvatar($data->get('avatar'));
		//$user->setDescription($data->get('desc'));
		//$user->setPosts($data->get('posts'));
		//$user->setWebsite($data->get('website'));
	//	$password = $this->encoder->encodePassword($data->get('password_first'), null);
		//$password = $encoder->encodePassword($user, $data['password_first']);
    $user->setPlainPassword($data->get('pass_first'));

   

		return $user;
			
	}

	public function updateUser(UserInterface $user)
	{

		$this->dbManager->persist($user);
		$this->dbManager->flush();

		return 'Rejestracja przebiegła pomyślnie';
		
	}

	public function getUser($email)
	{
		return $this->dbDoctrine->getRepository('UserBundle:User')->findOneBy(
			array('email' => $email));

	}

	public function isCorrectPassword($encoded, $raw)
	{
		return $this->bcryptEncoder->isPasswordValid($encoded, $raw, null);
	}


	public function existUser($username, $email)
	{
		$a = $this->dbRepository->isUser($username , $email)->getOneOrNullResult();
    
    return count($a) > 0 ? true : false; 

	}

	public function delete($email) {

	}

	public function update($email) {

	}

	public function getAllUsers() {
		return $this->dbDoctrine->getRepository('UserBundle:User')->findAll();
	}

}