<?php

use Its\Example\Dashboard\Core\Application\Service\LoginService;
use Its\Example\Dashboard\Core\Application\Service\CreateCommitteeService;
use Its\Example\Dashboard\Core\Application\Service\EditCommitteeService;
use Its\Example\Dashboard\Core\Application\Service\DeleteCommitteeService;
use Its\Example\Dashboard\Infrastructure\Persistence\Repository\CommitteeRepository;
use Its\Example\Dashboard\Infrastructure\Persistence\Repository\TicketCategoryRepository;
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

$di->set('db', function () {
    $adapter = getenv('DB_ADAPTER');
    return new $adapter([
        'host'     => getenv('DB_HOST'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'dbname'   => getenv('DB_NAME'),
    ]);
});

$di->set('committeeRepository', function () use ($di) {
    return new CommitteeRepository($di);
});

$di->set('ticketCategoryRepository', function () use ($di) {
    return new TicketCategoryRepository($di);
});

$di->set('loginService', function () use ($di) {
    return new LoginService($di->get('committeeRepository'));
});

$di->set('createCommitteeService', function () use ($di) {
    return new CreateCommitteeService($di->get('committeeRepository'));
});

$di->set('editCommitteeService', function () use ($di) {
    return new EditCommitteeService($di->get('committeeRepository'));
});

$di->set('deleteCommitteeService', function () use ($di) {
    return new DeleteCommitteeService($di->get('committeeRepository'));
});

$di->set('createTicketCategoryService', function () use ($di) {
    return new CreateTicketCategoryService($di->get('ticketCategoryRepository'));
});

$di->set('editTicketCategoryService', function () use ($di) {
    return new EditTicketCategoryService($di->get('ticketCategoryRepository'));
});

$di->set('deleteTicketCategoryService', function () use ($di) {
    return new DeleteTicketCategoryService($di->get('ticketCategoryRepository'));
});
