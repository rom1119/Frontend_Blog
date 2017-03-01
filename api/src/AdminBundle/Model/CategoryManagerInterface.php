<?php

namespace AdminBundle\Model;

use AdminBundle\Entity\Category;

interface CategoryManagerInterface {

  /**
   * Creates an empty user instance.
   *
   * @param $request
   *
   * @return UserInterface
   */
	public function create($request, $author);

  /**
   * Deletes a user.
   *
   * @param $request
   *
   * @return void
   */
	public function delete($request);

  /**
   * Gets all users exists.
   *
   * @return array $users
   */
	public function getAll();

   /**
     * Updates a user.
     *
     * @param UserInterface $user
     *
     * @return void
     */
    public function update(Category $category);
}