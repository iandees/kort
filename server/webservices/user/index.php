<?php
require_once('../../../lib/Slim-2.1.0/Slim/Slim.php');
require_once('../../../server/php/ClassLoader.php');

use Webservice\User\UserHandler;

// Load Slim library
\Slim\Slim::registerAutoloader();
Kort\ClassLoader::registerAutoLoader();
$app = new \Slim\Slim();
$res = $app->response();

 \session_start();

$userHandler = new UserHandler();

// define REST resources
$app->get(
    '/',
    function () use ($userHandler, $res) {
        $res->write($userHandler->getUser());
    }
);

$app->get(
    '/destroy',
    function () use ($res) {
        \session_destroy();
        $res->write("Destroyed session");
    }
);

// start Slim app
$app->run();