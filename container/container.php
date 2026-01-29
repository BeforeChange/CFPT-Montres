<?php

use Cfpt\Montres\Controllers\ErrorController;
use Cfpt\Montres\Middlewares\StaffMiddleware;
use Cfpt\Montres\Services\RoleService;
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

$container->set(RoleService::class, function (ContainerInterface $container) {
    return new RoleService($container->get(Database::class));
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

$container->set(ErrorController::class, function (ContainerInterface $container) {
    return new ErrorController(
        $container->get(PhpRenderer::class)
    );
});

$container->set(PhpRenderer::class, function (ContainerInterface $container) {
    return new PhpRenderer(__DIR__ . '/../views', [
        'title' => 'CFPT Montres',
        'extra_css' => [],
        'is_staff' => function() use ($container) {
            $user = $container->get(UserService::class)->getCurrentUser();
            return $user ? $container->get(RoleService::class)->isStaff($user->id_role) : false;
        },
    ], 'layout.php');
});

$container->set(StaffMiddleware::class, function (ContainerInterface $container) {
    return new StaffMiddleware(
        $container->get(UserService::class),
        $container->get(RoleService::class)
    );
});

return $container;