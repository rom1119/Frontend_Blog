<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/register", name="homepage")
     */
    public function indexAction(Request $request)
    {
        header('Access-Control-Allow-Origin: http://localhost:8080');
        header('Access-Control-Allow-Headers: Content-type');

        $post = file_get_contents( 'php://input' );
        //$_POST = json_decode( $post , true );

        // replace this example code with whatever you need
        $isXml = $request->get('email');
        return new JsonResponse(array("fsdf" => $post)); 
    }
}
