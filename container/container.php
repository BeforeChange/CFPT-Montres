<?php

use Cfpt\Montres\Controllers\AdminController;
use Cfpt\Montres\Controllers\ErrorController;
use Cfpt\Montres\Controllers\HomeController;
use Cfpt\Montres\Middlewares\AccessLoggerMiddleware;
use Cfpt\Montres\Middlewares\StaffMiddleware;
use Cfpt\Montres\Services\BrandService;
use Cfpt\Montres\Services\RoleService;
use Cfpt\Montres\Services\VersionService;
use Cfpt\Montres\Services\WatchService;
use Cfpt\Montres\Utils\Logger;
use DI\Container;
use Psr\Container\ContainerInterface;
use Cfpt\Montres\Controllers\AuthController;
use Cfpt\Montres\Infrastructure\Database;
use Cfpt\Montres\Services\UserService;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

$container = new Container();

$container->set(LoggerInterface::class, function (ContainerInterface $container) {
    return new Logger();
});


$container->set(Database::class, function (ContainerInterface $container) {
    return new Database($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
});

$container->set(RoleService::class, function (ContainerInterface $container) {
    return new RoleService($container->get(Database::class));
});

$container->set(UserService::class, function (ContainerInterface $container) {
    return new UserService($container->get(Database::class));
});

$container->set(VersionService::class, function (ContainerInterface $container) {
    return new VersionService($container->get(Database::class));
});

$container->set(WatchService::class, function (ContainerInterface $container) {
    return new WatchService($container->get(Database::class));
});

$container->set(BrandService::class, function (ContainerInterface $container) {
    return new BrandService($container->get(Database::class));
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

$container->set(AdminController::class, function (ContainerInterface $container) {
    return new AdminController(
        $container->get(PhpRenderer::class),
        $container->get(VersionService::class),
        $container->get(BrandService::class),
        $container->get(WatchService::class)
    );
});


$container->set(HomeController::class, function (ContainerInterface $container) {
    return new HomeController(
        $container->get(PhpRenderer::class),
        $container->get(VersionService::class),
        $container->get(BrandService::class),
        $container->get(WatchService::class)
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

$container->set(AccessLoggerMiddleware::class, function (ContainerInterface $container) {
    return new AccessLoggerMiddleware(
        $container->get(Logger::class)
    );
});

return $container;