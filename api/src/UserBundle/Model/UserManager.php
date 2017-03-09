<?php

namespace UserBundle\Model;

use UserBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Validator\RecursiveValidator;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UserManager  implements UserManagerInterface
{
  const NOT_BLANK_MESSAGE = 'To pole nie moze byc puste';
  const EMAIL_MESSAGE = 'Musisz podac poprawny email';
  const EQUAL_PASSWORDS_MESSAGE = 'Hasla musza byc takie same';
  const LENGTH_PASSWORDS_MESSAGE = 'To pole musi posiadac min {{ limit }} znakow';
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
		$notBlank = new Assert\NotBlank();
    $validEmail = new Assert\Email(array('checkMX' => true, 'checkHost' => true));
    $equalPassword = new Assert\EqualTo($data->get('_pass_conf'));
    $length = new Assert\Length(array('min' => 6));

    $notBlank->message = self::NOT_BLANK_MESSAGE;
    $validEmail->message = self::EMAIL_MESSAGE;
    $equalPassword->message = self::EQUAL_PASSWORDS_MESSAGE;
    $length->minMessage = self::LENGTH_PASSWORDS_MESSAGE;


    $violations['username'] = $this->validator->validate($data->get('_username'), array($notBlank));
    $violations['pass_first'] = $this->validator->validate($data->get('_pass_first'), array($notBlank, $equalPassword, $length));
    $violations['pass_conf'] = $this->validator->validate($data->get('_pass_conf'), array($notBlank, $equalPassword, $length));
    $violations['email'] = $this->validator->validate($data->get('_email'), array($notBlank, $validEmail));
    $violations['name'] = $this->validator->validate($data->get('_name'), array($notBlank));

    $response = null; 

    foreach ($violations as $key => $type) {
      foreach ($type as  $value) {
        $response[$key] = $value->getMessage();
      }
    }
      

    return $response;
		
	}

	public function userValidate($user, $data)
	{
		$errors = $this->validator->validate($user);

		if($this->existUser($data->get('_username'), $data->get('_email'))) {
      $res['error'] = "Taki użytkownik już istnieje";
			return $res;
		}

    if (count($errors) > 0) {
        /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
        $errorsString =  $errors;
        $res['error'] = $errorsString[0]->getMessage();
        return $res;
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

		$user->setName($data->get('_name'));
		$user->setSecondName($data->get('_secondname'));
		$user->setUsername($data->get('_username'));
		$user->setUsernameCanonical($data->get('_username'));
		$user->setEnabled(true);
		$user->setGender($data->get('_gender'));
		$user->setPhone($data->get('_phone'));
		$user->setEmail($data->get('_email'));
		$user->setEmailCanonical($data->get('_email'));
		$user->setSuperAdmin(true);
		//$user->setAvatar($data->get('avatar'));
		//$user->setDescription($data->get('desc'));
		//$user->setPosts($data->get('posts'));
		//$user->setWebsite($data->get('website'));
	//	$password = $this->encoder->encodePassword($data->get('password_first'), null);
		//$password = $encoder->encodePassword($user, $data['password_first']);
    $user->setPlainPassword($data->get('_pass_first'));

   

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

	public function isPasswordValid($encoded, $raw)
	{
		return $this->bcryptEncoder->isPasswordValid($encoded, $raw, null);
	}

	public function isPasswordsEqual($password, $password_conf)
	{
		return $password === $password_conf;
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