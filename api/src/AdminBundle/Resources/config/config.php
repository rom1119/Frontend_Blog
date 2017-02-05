<?php
$container->loadFromExtension('security', array(
    'encoders' => array(
        'Symfony\Component\Security\Core\User\User' => 'plaintext',
    ),

    'providers' => array(
        'in_memory' => array(
            'memory' => array(
                'users' => array(
                    'ryan' => array(
                        'password' => 'ryanpass',
                        'roles' => 'ROLE_USER',
                    ),
                    'admin' => array(
                        'password' => 'kitten',
                        'roles' => 'ROLE_ADMIN',
                    ),
                ),
            ),
        ),
    ),

    'firewalls' => array(
         'secured_area' => array(
         	'logout' => array('path' => '/logout', 'target' => '/widget'),
             'pattern'    => '^/',
             'anonymous' => array(),
             
             'http_basic' => array(
                 'realm'  => 'Secured Demo Area',
             ),
         ),
         

     ),

    'access_control' => array(
     array('path' => '^/admin', 'role' => 'ROLE_ADMIN'),
     
 ),


));


