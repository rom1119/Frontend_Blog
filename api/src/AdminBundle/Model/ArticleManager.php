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

    $article->setTitle($data->get('_title'));
    $article->setContent($data->get('_content'));
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
    $res = $this->dbRepository->findAll();
    $arr = array();
    $i = 0;
     foreach ($res as $key => $value) {
       $arr[$i]['title'] = $value->getTitle();
       $arr[$i]['content'] = $value->getContent();
       $arr[$i]['category'] = $value->getCategory()->getName();
       $arr[$i]['author'] = $value->getAuthor()->getUsername();
       $arr[$i]['date'] = $value->getDate();
       $i++;
     }

     return $arr;
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