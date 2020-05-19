<?php

use Phalcon\Session\Manager as SessionManager;
use Phalcon\Session\Adapter\Stream as Session;
use Phalcon\Security;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Escaper;

$di['config'] = function () use ($config) {
    return $config;
};

$di->setShared('session', function () {
    $session = new SessionManager();
    $files = new Session(
        [
            'savePath' => '/tmp',
        ]
    );
    $session
        ->setAdapter($files)
        ->start();

    return $session;
});

$di['dispatcher'] = function () use ($di, $defaultModule) {

    $eventsManager = $di->getShared('eventsManager');
    $dispatcher = new Dispatcher();
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
};

$di['url'] = function () use ($config, $di) {
    $url = new \Phalcon\Url();

    $url->setBaseUri($config->url['baseUrl']);

    return $url;
};

$di['voltService'] = function (\Phalcon\Mvc\ViewBaseInterface $view) use ($di, $config) {
    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
    if (!is_dir($config->application->cacheDir)) {
        mkdir($config->application->cacheDir);
    }

    $compileAlways = $config->mode == 'DEVELOPMENT' ? true : false;

    $volt->setOptions(array(
        'always'    => $compileAlways,
        'extension' => '.php',
        'separator' => '_',
        'stat'      => true,
        'path'      => $config->application->cacheDir,
        'prefix'    => '-prefix-',
    ));
    return $volt;
};

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(APP_PATH . '/common/views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di->set(
    'security',
    function () {
        $security = new Security();
        $security->setWorkFactor(12);

        return $security;
    },
    true
);

$di->set(
    'flash',
    function () {
        $escaper = new Escaper();
        $flash = new FlashDirect($escaper);
        $flash->setCssClasses(
            [
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]
        );

        return $flash;
    }
);

$di->set(
    'flashSession',
    function () {
        $escaper = new Escaper();
        $flash = new FlashSession($escaper);
        $flash->setCssClasses(
            [
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]
        );

        $flash->setAutoescape(false);

        return $flash;
    }
);
