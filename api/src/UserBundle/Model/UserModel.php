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

	public function create($data)
	{
		if(empty($data['username']) || empty($data['password_first'])) {
			//return 'Musisz wprowadzic wszystkie dane';
		}
		if($this->existUser($data['username'], $data['email'])) {
			return "Taki użytkownik już istnieje";
		}
		$fullDate = $data['birthday_day'] . '-' . ($data['birthday_month'] + 1) . '-' . $data['birthday_year'];

		$user = new userEntity();
		$user->setName($data['name']);
		$user->setSecondName($data['secondname']);
		$user->setUserName($data['username']);
		$user->setRole('USER');
		$user->setBirthdayDate(new \DateTime( $fullDate));
		$user->setGender($data['gender']);
		$user->setPhone($data['phone']);
		$user->setEmail($data['email']);
		//$user->setAvatar($data['avatar']);
		//$user->setDescription($data['desc']);
		//$user->setPosts($data['posts']);
		//$user->setWebsite($data['website']);
		$password = $this->bcryptEncoder->encodePassword($data['password_first'], null);
		//$password = $encoder->encodePassword($user, $data['password_first']);
    $user->setPassword($password);

		$dbManager = $this->dbManager;
		$dbManager->persist($user);
		$dbManager->flush();
		return 'udało sie zarejestrowac';
			
	}

	public function getUser($email)
	{
		return $this->dbRepository->findOneBy(
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

	public function readAll() {

}
	}