<?php

namespace UserBundle\Security\Providers;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use UserBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UserProvider implements UserProviderInterface, AuthenticationProviderInterface
{
    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function loadUserByUsername($username)
    {
        // make a call to your webservice here
        $userData = $this->em->loadUserByUsername($username);
        // pretend it returns an array on success, false if there is no user

        if ($userData) {
            $password = $userData->getPassword();

            // ...

            return new User($username, $password, null, $userData->$getRoles());
        }

        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
        );
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'AppBundle\Entity\User';
    }

    public function supports(TokenInterface $token) {

    }

    public function authenticate(TokenInterface $token)
    {
        # code...
    }
}