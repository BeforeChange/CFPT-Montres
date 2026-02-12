<?php

use Cfpt\Montres\Controllers\AdminController;
use Cfpt\Montres\Middlewares\StaffMiddleware;
use Slim\Routing\RouteCollectorProxy;

return function ($app) {
    $app->group('/admin', function(RouteCollectorProxy $group) {
        $group->get('/watches/store', [AdminController::class, 'add']);
        $group->post('/watches/store', [AdminController::class, 'store']);

        $group->get('/logs', [AdminController::class, 'logs']);
    })->add(StaffMiddleware::class);
};