<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('add_article', new Route('/post', array(
     '_controller' => 'AdminBundle:Article:addArticle'), array(),array(),null, null, array('POST')
));

$collection->add('get_articles', new Route('/posts', array(
     '_controller' => 'AdminBundle:Article:getArticleAll'), array(),array(),null, null, array('GET')
));

$collection->add('add_category', new Route('/category', array(
     '_controller' => 'AdminBundle:Category:addCategory'), array(),array(),null, null, array('POST')
));

$collection->add('add_category', new Route('/category/all', array(
     '_controller' => 'AdminBundle:Category:getCategoryAll'), array(),array(),null, null, array('GET')
));

$collection->add('add_category', new Route('/category/{name}', array(
     '_controller' => 'AdminBundle:Category:getCategory'), array(),array(),null, null, array('GET')
));


return $collection;
