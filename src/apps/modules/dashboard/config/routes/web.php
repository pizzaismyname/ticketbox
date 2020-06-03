<?php

use Phalcon\Mvc\Router;

$mod_config = [
    'namespace' => $module['webControllerNamespace'],
    'module' => $moduleName,
];

/** @var Router $router */

$router->add('/profile', array_merge($mod_config, [
    'controller' => 'index',
    'action' => 'index'
]));

$router->add('/login', array_merge($mod_config, [
    'controller' => 'login',
    'action' => 'index'
]));

$router->add('/logout', array_merge($mod_config, [
    'controller' => 'logout',
    'action' => 'index'
]));

$router->add('/committee/index', array_merge($mod_config, [
    'controller' => 'committee',
    'action' => 'index'
]));

$router->add('/committee/create', array_merge($mod_config, [
    'controller' => 'committee',
    'action' => 'create'
]));

$router->add('/committee/edit/{id}', array_merge($mod_config, [
    'controller' => 'committee',
    'action' => 'edit'
]));

$router->add('/committee/delete', array_merge($mod_config, [
    'controller' => 'committee',
    'action' => 'delete'
]));

$router->add('/ticketcategory/index', array_merge($mod_config, [
    'controller' => 'ticketCategory',
    'action' => 'index'
]));

$router->add('/ticketcategory/create', array_merge($mod_config, [
    'controller' => 'ticketCategory',
    'action' => 'create'
]));

$router->add('/ticketcategory/edit/{id}', array_merge($mod_config, [
    'controller' => 'ticketCategory',
    'action' => 'edit'
]));

$router->add('/ticketcategory/delete', array_merge($mod_config, [
    'controller' => 'ticketCategory',
    'action' => 'delete'
]));

$router->add('/reservation/index', array_merge($mod_config, [
    'controller' => 'reservation',
    'action' => 'index'
]));

$router->add('/reservation/create', array_merge($mod_config, [
    'controller' => 'reservation',
    'action' => 'create'
]));

$router->add('/reservation/view', array_merge($mod_config, [
    'controller' => 'reservation',
    'action' => 'view'
]));

$router->add('/reservation/verify', array_merge($mod_config, [
    'controller' => 'reservation',
    'action' => 'verify'
]));

$router->add('/reservation/cancel', array_merge($mod_config, [
    'controller' => 'reservation',
    'action' => 'cancel'
]));
