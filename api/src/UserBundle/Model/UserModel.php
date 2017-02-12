<?php

namespace UserBundle\Model;

use UserBundle\Entity\User as userEntity;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

class UserModel  implements UserModelInterface
{
	private $dbDoctrine;
	private $dbManager;
	private $dbRepository;
	private $bcryptEncoder;

	public function __construct($db)
	{
		$this->dbDoctrine = $db;
		$this->dbManager = $db->getManager();
		$this->dbRepository = $db->getRepository('UserBundle:User');
		$this->bcryptEncoder = new BCryptPasswordEncoder(4);
	}

	public function create($data, $valid)
	{
		if(empty($data['username']) || empty($data['password_first']) || empty($data['email'])) {
			return 'Musisz wypełnic obowiązkowe pola';
		}
		if($this->existUser($data['username'], $data['email'])) {
			return "Taki użytkownik już istnieje";
		}
		$user = new userEntity();

		// if(!is_object(@\DateTime::createFromFormat("d-m-y", '01-02-1990'))) {
		// 	return "wpowadzono niepoprawną date";
		// }
		$user->setBirthdayDate(new \DateTime($data['birthday_date']));

		$user->setName($data['name']);
		$user->setSecondName($data['secondname']);
		$user->setUserName($data['username']);
		$user->setRoles('ROLE_USER');
		$user->setGender($data['gender']);
		$user->setPhone($data['phone']);
		$user->setEmail($data['email']);
		$user->setApiKey(random_bytes(20));
		//$user->setAvatar($data['avatar']);
		//$user->setDescription($data['desc']);
		//$user->setPosts($data['posts']);
		//$user->setWebsite($data['website']);
		$password = $this->bcryptEncoder->encodePassword($data['password_first'], null);
		//$password = $encoder->encodePassword($user, $data['password_first']);
    $user->setPassword($password);

    $validator = $valid;
    $errors = $validator->validate($user);

    if (count($errors) > 0) {
        /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
        $errorsString =  $errors;

        return $errorsString[0]->getMessage();
    }

		$dbManager = $this->dbManager;
		$dbManager->persist($user);
		$dbManager->flush();
		return 'udało sie zarejestrowac';
			
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