<?php

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;


/*

$container->setDefinition(
    'project.example',
    new Definition(
        'Project\ProjectBundle\Example',
        array(
            new Reference('service_id'),
            "plain_value",
            new Parameter('parameter_name'),
        )
    )
);

*/
 $container->setParameter('default.controller.class', 'Project\ProjectBundle\Entity2\Task');
 $container->setParameter('my_mailer.transport', 'sendmail');

 $container->setDefinition('my_data_base', new Definition(
     '%default.controller.class%'
 ));

  $container->setDefinition('app.token_authenticator', new Definition(
     'UserBundle\Security\TokenAuthenticator', array(new Reference('doctrine.orm.entity_manager')))
 );

$container->setDefinition(
    'app.my_user_provider',
    new Definition('UserBundle\Security\Providers\UserProvider', array(new Reference('doctrine.orm.entity_manager')))
    );

 $container->setDefinition('time_authenticator', new Definition(
     'UserBundle\Security\TimeAuthenticator',
     array(new Reference('security.password_encoder'))
 ));