<?php

use DI\Container;
use Psr\Container\ContainerInterface;
use Cfpt\Montres\Controllers\AuthController;
use Cfpt\Montres\Infrastructure\Database;
use Cfpt\Montres\Services\UserService;
use Slim\Views\PhpRenderer;

$container = new Container();

$container->set(Database::class, function (ContainerInterface $container) {
    return new Database($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
});

$container->set(UserService::class, function (ContainerInterface $container) {
    return new UserService($container->get(Database::class));
});

$container->set(AuthController::class, function (ContainerInterface $container) {
    return new AuthController(
        $container->get(PhpRenderer::class),
        $container->get(UserService::class)
    );
});

$container->set(PhpRenderer::class, function (ContainerInterface $container) {
    return new PhpRenderer(__DIR__ . '/../views', [
        'title' => 'CFPT Montres',
        'extra_css' => []
    ], 'layout.php');
});


return $container;