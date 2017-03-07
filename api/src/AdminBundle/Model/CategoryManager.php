<?php

namespace AdminBundle\Model;

use Doctrine\ORM\EntityManager;
use AdminBundle\Entity\Category;

/**
* 
*/
class CategoryManager implements CategoryManagerInterface
{
  
  private $dbManager;
  private $dbRepository;

  function __construct(EntityManager $em)
  {
    $this->dbManager = $em;
    $this->dbRepository = $em->getRepository('AdminBundle:Category');
  }

  public function create($data, $author)
  {
   // if($data->get('category_type') === 'main') {
      $category = new Category();
      $category->setType('mainCategory');
    
    // } else if($data->get('category_type') === 'sub') {
    //   $category = new Category();
    //   $this->type = 'subCategory';
    // }

    $category->setDate(new \DateTime());
    $category->setName($data->get('_category'));
    $category->setAuthor($author);

    return $category;
  }


  public function delete($value='')
  {
    # code...
  }

  public function get($name)
  {
    return $this->dbRepository->findOneByName($name);
  }

  public function categoryExist($name)
  {
    return (bool) $this->get($name);
  }

  public function getAll()
  {
     $arr = $this->dbRepository->findAll();
     foreach ($arr as $value) {
       $response[] = $value->getName();
     }

     return $response;
  }

  public function update(Category $category)
  {

    $this->dbManager->persist($category);
    $this->dbManager->flush();

    return 'Utworzono kategorie: ' . $category->getName();
  }
}