<?php

use Its\Example\Dashboard\Core\Application\Service\LoginService;
use Its\Example\Dashboard\Infrastructure\Persistence\Repository\UserRepository;
use Phalcon\Di\DiInterface;
use Phalcon\Mvc\View;

/** @var DiInterface $di */
$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../Presentation/Web/views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
        );

    return $view;
};

$di->set('userRepository', function () use ($di) {
    return new UserRepository($di);
});

$di->set('loginService', function () use ($di) {
    return new LoginService($di->get('userRepository'));
});