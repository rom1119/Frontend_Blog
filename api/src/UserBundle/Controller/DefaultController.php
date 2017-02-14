<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use UserBundle\Model\UserModel;
use UserBundle\Model\Authentication;
use UserBundle\Repository\UserRepository;

class DefaultController extends Controller
{
    private $data;

    public function __construct() {
        header('Access-Control-Allow-Origin: http://localhost:8080');
        header('Access-Control-Allow-Headers: Content-type');
        // $post = file_get_contents( 'php://input' );
        // $this->data = json_decode( $post , true );
    }

    public function registerAction(Request $request)
    {
        if($request->getMethod() === 'POST') {

         $model = new UserModel($this->getDoctrine());
         $msg = $model->create($this->data, $this->get('validator'));
     // $msg = $model->existUser($this->data['username'], $this->data['email']);

      // $model = new UserModel($this->getDoctrine());
      // $aaa = $model->isExist($this->data['username'], $this->data['email']);        
        $isXml = $request->getMethod();
            return new Response($msg); 
        }
        return new Response('Aby założyc konto musisz przesłac dane metodą POST'); 
    }

    public function authAction(Request $request)
    {
        $auth = new Authentication(new UserModel($this->getDoctrine()), $this->getDoctrine()->getManager());
        $response = $auth->login($this->data['_username'], $this->data['_password']);

        //return new Response('$response', 200,array('X-AUTH-TOKEN' => $response['data']['apiKey']));
        return new Response($response);
    }

    public function verifyAction(Request $request)
    {
        $auth = new Authentication(new UserModel($this->getDoctrine()));
        $response = (string)$auth->isValidToken($this->data['token']);

        return new Response($response);
    }

    public function getUsersAction(Request $request)
    {
        $model = new UserModel($this->getDoctrine());
        $users = $model->getAllUsers();

        return new Response(var_dump($users));
    }

    public function loginAction(Request $request)
    {
        //  $authenticationUtils = $this->get('security.authentication_utils');

        // // get the login error if there is one
        // $error = $authenticationUtils->getLastAuthenticationError();

        // // last username entered by the user
        // $lastUsername = $authenticationUtils->getLastUsername();

        // return $this->render(
        //     'UserBundle:security:login.html.twig',
        //     array(
        //         // nazwa użytkownika ostatnio wprowadzona przez aktualnego użytkownika
        //         'last_username' => $lastUsername,
        //         'error'         => $error,
        //     )
        // );


        if ($this->has('security.csrf.token_manager')) {
            $csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
        } else {
            // BC for SF < 2.4
            $csrfToken = $this->has('form.csrf_provider')
                ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
                : null;
        }
        return new Response('Wpisz dane logowania');
    }

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
