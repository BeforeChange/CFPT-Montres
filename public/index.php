<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use Slim\Factory\AppFactory;

$container = require __DIR__ . '/../container/container.php';
AppFactory::setContainer($container);

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

(require __DIR__ . '/../routes/HomeRoutes.php')($app);
(require __DIR__ . '/../routes/AuthRoutes.php')($app);

$app->run();