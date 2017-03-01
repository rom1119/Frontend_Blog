<?php
$container->loadFromExtension('security', array(
    'encoders' => array(

        'FOS\UserBundle\Model\UserInterface' => array(
            'algorithm' => 'bcrypt',

        )
    ),

    'role_hierarchy' => array(
        'ROLE_ADMIN' => 'ROLE_ADMIN',
        'ROLE_SUPER_ADMIN' => 'ROLE_ADMIN'
    ),

    'providers' => array(

        'fos_userbundle' => array(
            'id' => 'fos_user.user_provider.username'    
        )
    ),

    'firewalls' => array(
        'main' => array(
             'logout' => array('path' => '/logout', 'target' => '/logout/success'),
            'pattern'    => '^/',
            'anonymous' => true,
            'form_login' => array(
                 'provider' => 'fos_userbundle',
                 'csrf_token_generator' => 'security.csrf.token_manager',
                 //'default_target_path' => '/',
                 //'always_use_default_target_path' => true,
                 //'use_forward' => true
             ),
            

        ),
         

     ),

    // 'access_control' => array(

    //     array('path' => '^/postadd$', 'role' => 'ROLE_SUPER_ADMIN'),
     
    // ),


));
