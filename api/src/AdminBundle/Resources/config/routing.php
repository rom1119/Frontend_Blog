<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('project_homepage', new Route('/this', array(
    '_controller' => 'AdminBundle:Default:index')
    ));


return $collection;
