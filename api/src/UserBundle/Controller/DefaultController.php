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

     public function sendMessageAction(Request $request)
     {
        if (!$this->isCsrfTokenValid('authenticate', $request->request->get('_csrf_token'))) {
            return new Response('Wystapil problem z tokenem csrf');
        }

       $contact_manager = $this->get('blog.user.message.contact_manager');

        if(null === $response = $contact_manager->validate($request->request)) {
            $contact_manager->setSubject($request->request->get('_subject'))
            ->setReplyTo($request->request->get('_email'))
            ->setBody(
               $request->request->get('_body')
            );

            $contact_manager->send();
            $response['success'] = 'Wiadomosc zostala wyslana';
        }
        
        return new JsonResponse($response);
     }

     public function getCsrfTokenAction(Request $request)
     {
         if ($this->has('security.csrf.token_manager')) {
            $response['csrf_token'] = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();

        } else {
            // BC for SF < 2.4
            $response['csrf_token'] = $this->has('form.csrf_provider')
                ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
                : null;
        }

        return new JsonResponse($response);
     }

}
