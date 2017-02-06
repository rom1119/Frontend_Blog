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
        $post = file_get_contents( 'php://input' );
        $this->data = json_decode( $post , true );
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
        $auth = new Authentication(new UserModel($this->getDoctrine()));
        $response = $auth->login($this->data['email'], $this->data['password']);

        return new JsonResponse($response);
    }

    public function verifyAction(Request $request)
    {
        $auth = new Authentication(new UserModel($this->getDoctrine()));
        $response = (string)$auth->isValidToken($this->data['token']);

        return new Response($response);
    }

}
