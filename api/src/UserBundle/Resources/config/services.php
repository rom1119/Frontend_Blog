<?php

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;


 $container->setDefinition(
    'blog.user.model.user_manager',
    new Definition('UserBundle\Model\UserManager', array(new Reference('doctrine.orm.entity_manager'), new Reference('validator'), new Reference('security.password_encoder')))
    );