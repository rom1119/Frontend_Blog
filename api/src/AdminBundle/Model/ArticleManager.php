<?php

namespace AdminBundle\Model;

use Doctrine\ORM\EntityManager;
use AdminBundle\Entity\Article;


/**
* 
*/
class ArticleManager implements ArticleManagerInterface
{
    
  private $dbManager;
  private $dbRepository;

  function __construct(EntityManager $em)
  {
    $this->dbManager = $em;
    $this->dbRepository = $em->getRepository('AdminBundle:Article');
  }

  public function create($data, $author, $category)
  {
    $article = new Article();

    $article->setTitle($data->get('title'));
    $article->setContent($data->get('content'));
    $article->setCategory($category);
    $article->setAuthor($author);
    $article->setDate(new \DateTime());
    $article->setViews(0);
    $article->setType('Review');
    $article->setPublished(false);

    return $article;
  }

  public function delete($value='')
  {
    # code...
  }

  public function getAll()
  {
    return $this->dbRepository->findAll();
  }

  public function update(Article $article)
  {
    $this->dbManager->persist($article);
    $this->dbManager->flush();

    return 'Utworzono artykuł o tytule: ' . $article->getTitle();
  }

  public function publish(Article $article)
  {
    # code...
  }

  public function unPublish(Article $article)
  {
    # code...
  }
}