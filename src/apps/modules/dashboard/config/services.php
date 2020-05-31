<?php

use Its\Example\Dashboard\Core\Application\Service\LoginService;
use Its\Example\Dashboard\Core\Application\Service\ListCommitteeService;
use Its\Example\Dashboard\Core\Application\Service\CreateCommitteeService;
use Its\Example\Dashboard\Core\Application\Service\EditCommitteeService;
use Its\Example\Dashboard\Core\Application\Service\DeleteCommitteeService;
use Its\Example\Dashboard\Core\Application\Service\ViewCommitteeService;
use Its\Example\Dashboard\Core\Application\Service\CreateTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Service\ListTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Service\EditTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Service\DeleteTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Service\ViewTicketCategoryService;
use Its\Example\Dashboard\Core\Application\Service\CreateReservationService;
use Its\Example\Dashboard\Core\Application\Service\ListReservationService;
use Its\Example\Dashboard\Core\Application\Service\DeleteReservationService;
use Its\Example\Dashboard\Core\Application\Service\VerifyReservationService;
use Its\Example\Dashboard\Core\Application\Service\ViewReservationStatusService;
use Its\Example\Dashboard\Infrastructure\Persistence\Repository\CommitteeRepository;
use Its\Example\Dashboard\Infrastructure\Persistence\Repository\TicketCategoryRepository;
use Its\Example\Dashboard\Infrastructure\Persistence\Repository\ReservationRepository;
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

$di->set('reservationRepository', function () use ($di) {
    return new ReservationRepository($di);
});

$di->set('loginService', function () use ($di) {
    return new LoginService($di->get('committeeRepository'));
});

$di->set('createCommitteeService', function () use ($di) {
    return new CreateCommitteeService($di->get('committeeRepository'));
});

$di->set('listCommitteeService', function () use ($di) {
    return new ListCommitteeService($di->get('committeeRepository'));
});

$di->set('editCommitteeService', function () use ($di) {
    return new EditCommitteeService($di->get('committeeRepository'));
});

$di->set('deleteCommitteeService', function () use ($di) {
    return new DeleteCommitteeService($di->get('committeeRepository'));
});

$di->set('viewCommitteeService', function () use ($di) {
    return new ViewCommitteeService($di->get('committeeRepository'));
});

$di->set('createTicketCategoryService', function () use ($di) {
    return new CreateTicketCategoryService($di->get('ticketCategoryRepository'));
});

$di->set('listTicketCategoryService', function () use ($di) {
    return new ListTicketCategoryService($di->get('ticketCategoryRepository'));
});

$di->set('editTicketCategoryService', function () use ($di) {
    return new EditTicketCategoryService($di->get('ticketCategoryRepository'));
});

$di->set('deleteTicketCategoryService', function () use ($di) {
    return new DeleteTicketCategoryService($di->get('ticketCategoryRepository'));
});

$di->set('viewTicketCategoryService', function () use ($di) {
    return new ViewTicketCategoryService($di->get('ticketCategoryRepository'));
});

$di->set('createReservationService', function () use ($di) {
    return new CreateReservationService($di->get('reservationRepository'), $di->get('ticketCategoryRepository'));
});

$di->set('listReservationService', function () use ($di) {
    return new ListReservationService($di->get('reservationRepository'), $di->get('committeeRepository'));
});

$di->set('deleteReservationService', function () use ($di) {
    return new DeleteReservationService($di->get('reservationRepository'));
});

$di->set('verifyReservationService', function () use ($di) {
    return new VerifyReservationService($di->get('reservationRepository'), $di->get('committeeRepository'));
});

$di->set('viewReservationStatusService', function () use ($di) {
    return new ViewReservationStatusService($di->get('reservationRepository'));
});
