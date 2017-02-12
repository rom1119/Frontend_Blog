<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

// $collection->add('register', new Route('/user/register', array(
//     '_controller' => 'UserBundle:Default:register'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
//     ));

// $collection->add('auth', new Route('/auth', array(
//     '_controller' => 'UserBundle:Default:auth'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
//     ));

$collection->add('logoutSuccess', new Route('/logout/success', array(
    '_controller' => 'UserBundle:Default:logoutSuccess'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
    ));

$collection->add('loginSuccess', new Route('/', array(
    '_controller' => 'UserBundle:Default:loginSuccess'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
    ));

$collection->add('getUsers', new Route('/admin/users', array(
    '_controller' => 'UserBundle:Default:getUsers'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
    ));

// $collection->add('logout', new Route('/admin/logout'));
// $collection->add('login_route', new Route('/login', array(
//     '_controller' => 'UserBundle:Default:login'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
//     ));

// $collection->add('login_check', new Route('/login_check'));

return $collection;


// adam.terepora@kerris.pl