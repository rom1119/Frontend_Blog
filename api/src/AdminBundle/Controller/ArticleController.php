<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use UserBundle\Model\UserModel;


class ArticleController extends Controller
{
  // public function __construct() {
  //       header('Access-Control-Allow-Origin: http://localhost:8080');
  //       header('Access-Control-Allow-Headers: Content-type');
  //       // $post = file_get_contents( 'php://input' );
  //       // $this->data = json_decode( $post , true );
  //   }
  public function addArticleAction(Request $request)
  {

    $category_manager = $this->get('blog.admin.model.category_manager');
    $article_manager = $this->get('blog.admin.model.article_manager');
    try{
     $tokenStorage = $this->get('security.token_storage');
     if(!is_object($user = $tokenStorage->getToken()->getUser())) {
         throw new \Exception();
     }
     if($category_manager->categoryExist($request->request->get('_category'))) {

        $category = $category_manager->get($request->request->get('_category'));
        $article = $article_manager->create($request->request, $user, $category);
        $response = $article_manager->update($article);

     } else {
      $response = 'Kategoria która chcesz dodac juz istnieje';
     }

    } catch(Exeption $e) {
      $response = 'nie jestes zalogowany';
    }
  
    return new JsonResponse($response);
  }

  public function getArticleAllAction(Request $request)
  {

    $article_manager = $this->get('blog.admin.model.article_manager');
    if(null === $response = $article_manager->getAll()) {
      $response = 'Nie opublikowano zadnych artykułów';
    }
  
    return new JsonResponse($response);
  }



}