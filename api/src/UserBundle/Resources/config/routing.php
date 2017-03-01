<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('logoutSuccess', new Route('/logout/success', array(
    '_controller' => 'UserBundle:Default:logoutSuccess'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
    ));

$collection->add('loginSuccess', new Route('/', array(
    '_controller' => 'UserBundle:Default:loginSuccess'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
));

$collection->add('register', new Route('/register', array(
    '_controller' => 'UserBundle:Registration:register'), array(),array(),null, null, array('OPTIONS', 'POST')
));

$collection->add('login_route', new Route('/login', array(
     '_controller' => 'UserBundle:Security:login'), array(),array(),null, null, array('GET')
));

 //  Routing for article

$collection->add('get_articles', new Route('/posts', array(
     '_controller' => 'UserBundle:Article:getArticles'), array(),array(),null, null, array('GET')
));


return $collection;

