<?php

namespace AdminBundle\Model;

use AdminBundle\Entity\Article;

interface ArticleManagerInterface {

  /**
   * Creates an empty article instance.
   *
   * @param $request
   *
   * @return articleInterface
   */
	public function create($data, $author, $category);

  /**
   * Deletes a article.
   *
   * @param $request
   *
   * @return void
   */
	public function delete($request);

  /**
   * Gets all articles exists.
   *
   * @return array $articles
   */
	public function getAll();

  /**
   * Updates a article.
   *
   * @param Article $article
   *
   * @return void
   */
  public function update(Article $article);

  /**
   * Publish a article.
   *
   * @param Article $article
   *
   * @return void
   */
  public function publish(Article $article);

  /**
   * Unpublish a article.
   *
   * @param Article $article
   *
   * @return void
   */
  public function unPublish(Article $article);
}