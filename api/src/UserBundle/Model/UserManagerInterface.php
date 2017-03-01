<?php

namespace UserBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserManagerInterface {

  /**
   * Creates an empty user instance.
   *
   * @param $request
   *
   * @return UserInterface
   */
	public function createUser($request);

  /**
   * Deletes a user.
   *
   * @param $request
   *
   * @return void
   */
	public function delete($email);

  /**
   * Deletes a user.
   *
   * @return UserInterface
   */
	public function update($email);

  /**
   * Gets all users exists.
   *
   * @return array $users
   */
	public function getAllUsers();

   /**
     * Updates a user.
     *
     * @param UserInterface $user
     *
     * @return void
     */
    public function updateUser(UserInterface $user);
}