<?php

use Its\Example\Dashboard\Core\Application\Service\LoginService;
use Its\Example\Dashboard\Infrastructure\Persistence\Repository\CommitteeRepository;
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

$di->set('committeeRepository', function () use ($di) {
    return new CommitteeRepository($di);
});

$di->set('loginService', function () use ($di) {
    return new LoginService($di->get('committeeRepository'));
});