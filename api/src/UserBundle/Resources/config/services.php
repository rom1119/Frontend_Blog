<?php

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;

// $container->setParameter('swift_mailer', 'Swift_Mailer');

// $container->setParameter('swift-transport', '\Swift_MailTransport');
// $container->setParameter('swift-message', '\Swift_Message');


// $container->setDefinition(
//     'mailer',
//     new Definition('/Swift_Mailer', array())
//     );

// $container->setDefinition(
//     'transport',
//     new Definition('/Swift_MailTransport', array())
//     );

// $container->setDefinition(
//     'message',
//     new Definition('/Swift_Message', array())
//     );

$container->setDefinition(
  'blog.user.model.user_manager',
  new Definition('UserBundle\Model\UserManager', array(new Reference('doctrine.orm.entity_manager'), new Reference('validator'), new Reference('security.password_encoder')))
  );

$container->setDefinition(
    'blog.user.message.mailer',
    new Definition('UserBundle\Messages\Mailer', array(new Reference('mailer')))
    );

$container->setDefinition(
    'blog.user.message.contact_manager',
    new Definition('UserBundle\Messages\ContactManager', array(new Reference('blog.user.message.mailer')))
    );

$container->setDefinition(
    'blog.user.message.newsletter_manager',
    new Definition('UserBundle\Messages\NewsletterManager', array(new Reference('blog.user.message.mailer')))
    );