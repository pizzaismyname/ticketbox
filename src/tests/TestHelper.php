<?php

use Its\Example\Dashboard\Infrastructure\Persistence\Repository\CommitteeRepository;
use Its\Example\Dashboard\Infrastructure\Persistence\Repository\TicketCategoryRepository;
use Its\Example\Dashboard\Infrastructure\Persistence\Repository\ReservationRepository;
use Phalcon\Di;
use Phalcon\Di\FactoryDefault;
use Phalcon\Loader;

ini_set("display_errors", 1);
error_reporting(E_ALL);

define("ROOT_PATH", __DIR__);
define("APP_PATH", ROOT_PATH . '/../apps');

ini_set('assert.exception', true);

set_include_path(
    ROOT_PATH . PATH_SEPARATOR . get_include_path()
);

// Required for phalcon/incubator
include __DIR__ . "/../vendor/autoload.php";

// Use the application autoloader to autoload the classes
// Autoload the dependencies found in composer
$loader = new Loader();

$loader->registerDirs(
    [
        ROOT_PATH,
    ]
);

$loader->registerNamespaces([
    'Common\Interfaces' => APP_PATH . '/common/Interfaces',
    'Common\Structure' => APP_PATH . '/common/Structure',
    'Common\Utility' => APP_PATH . '/common/Utility',

    'Its\Example\Dashboard\Core\Domain\Exception' => APP_PATH . '/modules/dashboard/Core/Domain/Exception',
    'Its\Example\Dashboard\Core\Domain\Model\Committee' => APP_PATH . '/modules/dashboard/Core/Domain/Model/Committee',
    'Its\Example\Dashboard\Core\Domain\Model\TicketCategory' => APP_PATH . '/modules/dashboard/Core/Domain/Model/TicketCategory',
    'Its\Example\Dashboard\Core\Domain\Model\Reservation' => APP_PATH . '/modules/dashboard/Core/Domain/Model/Reservation',
    'Its\Example\Dashboard\Core\Domain\Interfaces' => APP_PATH . '/modules/dashboard/Core/Domain/Interfaces',

    'Its\Example\Dashboard\Infrastructure\Persistence\Mapper' => APP_PATH . '/modules/dashboard/Infrastructure/Persistence/Mapper',
    'Its\Example\Dashboard\Infrastructure\Persistence\Repository' => APP_PATH . '/modules/dashboard/Infrastructure/Persistence/Repository',
    'Its\Example\Dashboard\Infrastructure\Persistence\Record' => APP_PATH . '/modules/dashboard/Infrastructure/Persistence/Record',
]);

$loader->register();

$di = new FactoryDefault();

Di::reset();

// Add any needed services to the DI here

$di->set('db', function () {
    $adapter = Phalcon\Db\Adapter\Pdo\Mysql::class;
    return new $adapter([
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'ticketbox',
    ]);
});

$di->set('committeeRepository', function() use ($di) {
    return new CommitteeRepository($di);
});

$di->set('ticketCategoryRepository', function() use ($di) {
    return new TicketCategoryRepository($di);
});

$di->set('reservationRepository', function() use ($di) {
    return new ReservationRepository($di);
});

Di::setDefault($di);