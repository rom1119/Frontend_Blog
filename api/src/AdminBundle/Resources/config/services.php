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
 $container->setDefinition(
    'blog.admin.model.category_manager',
    new Definition('AdminBundle\Model\CategoryManager', array(new Reference('doctrine.orm.entity_manager')))
    );

  $container->setDefinition(
    'blog.admin.model.article_manager',
    new Definition('AdminBundle\Model\ArticleManager', array(new Reference('doctrine.orm.entity_manager')))
    );