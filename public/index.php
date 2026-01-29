<?php

use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Response;

require __DIR__ . '/../vendor/autoload.php';

session_start();

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use Slim\Factory\AppFactory;

$container = require __DIR__ . '/../container/container.php';
AppFactory::setContainer($container);

$app = AppFactory::create();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$errorMiddleware->setErrorHandler(
    HttpNotFoundException::class,
    function ($request, $exception, $displayErrorDetails) {
        $response = new Response();

        return $response
            ->withHeader('Location', '/404')
            ->withStatus(301);
    }
);

(require __DIR__ . '/../routes/HomeRoutes.php')($app);  
(require __DIR__ . '/../routes/AuthRoutes.php')($app);

$app->run();