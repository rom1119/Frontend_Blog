<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{

    public function loginCheckAction()
     {
         // ta akcja nie będzie wykonywana,
         // ponieważ trasa jest wykorzystywana przez system bezpieczeństwa
     }

     public function logoutSuccessAction(Request $request)
     {

         return new Response('Zostałeś wylogowany');
     }

     public function loginSuccessAction(Request $request)
     {
         try {
             $tokenStorage = $this->get('security.token_storage');
             if(!is_object($user = $tokenStorage->getToken()->getUser())) {
                 throw new \Exception();
             }
                 $response['message'] = $user->getUsername();
                 $response['isAuth'] = true;

         } catch (\Exception $e) {
             $response['message'] = 'Nie jesteś zalogowany' ;
             $response['isAuth'] = false;
         }

         return new JsonResponse($response);
     }

}
