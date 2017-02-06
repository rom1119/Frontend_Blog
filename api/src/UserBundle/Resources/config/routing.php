<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('register', new Route('/register', array(
    '_controller' => 'UserBundle:Default:register'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
    ));

$collection->add('login', new Route('/auth', array(
    '_controller' => 'UserBundle:Default:auth'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
    ));

$collection->add('verify', new Route('/verify', array(
    '_controller' => 'UserBundle:Default:verify'), array(),array(),null, null, array('GET','OPTIONS', 'POST', 'PUT')
    ));

return $collection;
