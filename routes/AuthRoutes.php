<?php

use Cfpt\Montres\Controllers\AuthController;
use Cfpt\Montres\Middlewares\AuthMiddleware;

return function ($app) {
    $app->get('/login', [AuthController::class, 'showLogin']);
    $app->post('/login', [AuthController::class, 'login']);

    $app->get('/logout', [AuthController::class, 'logout']);

    $app->get('/register', [AuthController::class, 'showRegister']);
    $app->post('/register', [AuthController::class, 'register']);

    $app->group('/profil', function($group) {
        $group->get('', [AuthController::class, 'profil']);
        $group->get('/edit', [AuthController::class, 'showEdit']);
        $group->post('/update', [AuthController::class, 'update']);
    })->add(new AuthMiddleware());
};