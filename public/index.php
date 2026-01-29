<?php

use Cfpt\Montres\Controllers\ErrorController;
use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Request;
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

$errorMiddleware->setDefaultErrorHandler(
    function (Request $request, Throwable $exception, bool $displayErrorDetails) use ($app) : Response {

        $response = new Response();

        $status = 500;
        if ($exception instanceof HttpNotFoundException) {
            $status = 404;
        } elseif (method_exists($exception, 'getCode') && $exception->getCode() >= 400 && $exception->getCode() < 600) {
            $status = $exception->getCode();
        }

        $controller = $app->getContainer()->get(ErrorController::class);
        return $controller->show($request, $response, ['code' => $status]);
    }
);

(require __DIR__ . '/../routes/HomeRoutes.php')($app);  
(require __DIR__ . '/../routes/AuthRoutes.php')($app);

$app->run();