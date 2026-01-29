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

$errorMiddleware->setDefaultErrorHandler(
    function ($request, Throwable $exception, bool $displayErrorDetails) {
        $response = new Response();

        $status = 500;
        if ($exception instanceof HttpNotFoundException) {
            $status = 404;
        }

        $controller = new \Cfpt\Montres\Controllers\ErrorController();
        return $controller->show($request, $response, ['code' => $status]);
    }
);

(require __DIR__ . '/../routes/HomeRoutes.php')($app);  
(require __DIR__ . '/../routes/AuthRoutes.php')($app);

$app->run();