<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use UserBundle\Model\UserModel;


class ArticleController extends Controller
{
  public function getArticles(Request $request)
  {
    return new Response('posty');
  }

}