<?php
$container->loadFromExtension('security', array(
    'encoders' => array(
        // 'UserBundle\Entity\User' => array(
        //     'algorithm' => 'bcrypt',
        //     'cost' => 4
        // ),
        // 'UserBundle\Security\Providers\UserProvider' =>  array(
        //     'algorithm' => 'bcrypt',
        //     'cost' => 4 
        // )
        'FOS\UserBundle\Model\UserInterface' => array(
            'algorithm' => 'bcrypt',

        )
    ),

    'role_hierarchy' => array(
        'ROLE_ADMIN' => 'ROLE_ADMIN',
        //'ROLE_SUPER_ADMIN' => 'ROLE_ADMIN'
    ),

    'providers' => array(
        // 'my_provider' => array(
        //     'id' => 'app.my_user_provider'
        // ),
        // 'our_db_provider' => array(
        //     'entity' => array(
        //         'class' => 'UserBundle:User',

        //     ),
        // ),
        'fos_userbundle' => array(
            'id' => 'fos_user.user_provider.username'    
        )
    ),

    'firewalls' => array(
        'main' => array(
         	 'logout' => array('path' => '/logout', 'target' => '/logout/success'),
          //   'pattern'    => '^/admin',
          //   'provider'      => 'our_db_provider',
          //   'http_basic' => null,
            
          //    'anonymous'  => null,
          //   // 'http_basic' => null,
          //    'form_login' => array(
          //        'login_path' => '/login',
          //        'check_path' => '/login_check',
          //    ),
             
            // 'pattern'        => '^/admin',
            //  'logout'         => true,
            //  'guard'          => array(
            //      'authenticators'  => array(
            //          'app.token_authenticator'
            //      ),
            //  ),
             // 'remote_user' => array(

             //    'provider' => 'our_db_provider')

            'pattern'    => '^/',
            //'logout' => true,
             'anonymous' => true,
            'form_login' => array(
                 'provider' => 'fos_userbundle',
                // 'csrf_token_generator' => 'security.csrf.token_manager',
                 'default_target_path' => '/'
                 //'always_use_default_target_path' => false,
                 //'use_forward' => true
             ),

        ),
         

     ),

    'access_control' => array(

        array('path' => '^/login$', 'role' => 'IS_AUTHENTICATED_ANONYMOUSLY'),
        array('path' => '^/admin/users', 'role' => 'ROLE_SUPER_ADMIN')
     
    ),


));


