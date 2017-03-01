<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use UserBundle\Model\UserModel;
use AdminBundle\Model\CategoryManager;


class CategoryController extends Controller
{
  public function addCategoryAction(Request $request)
  {

    $category_manager = $this->get('blog.admin.model.category_manager');
    try{
       $tokenStorage = $this->get('security.token_storage');
       if(!is_object($user = $tokenStorage->getToken()->getUser())) {
           throw new \Exception();
       }
       if(!$category_manager->categoryExist($request->request->get('category'))) {
          $category = $category_manager->create($request->request, $user);
          $response = $category_manager->update($category);
       } else {
        $response = 'Kategoria która chcesz dodac juz istnieje';
       }

         

    } catch(Exeption $e) {
      $response = 'nie jestes zalogowany';
    }

    
    return new JsonResponse($response);
  }

  public function getCategoryAction(Request $request, $name)
  {
    $category_manager = $this->get('blog.admin.model.category_manager');
    if($category_manager->categoryExist($name)) {
      $response = $category_manager->get($name);
    } else {
     $response = 'Podana kategoria nie istnieje';  
    }


    return new JsonResponse($response);
  }

  public function getCategoryAllAction(Request $request)
  {
    $category_manager = $this->get('blog.admin.model.category_manager');
    if(null === $response = $category_manager->getAll()) {
      $response = 'Nie dodano rzadnych kategorii';
    }

    return new JsonResponse($response);
  }
}