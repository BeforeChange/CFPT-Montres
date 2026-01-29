<?php

use Cfpt\Montres\Controllers\AuthController;

return function ($app) {
    $app->get('/login', [AuthController::class, 'showLogin']);
    $app->post('/login', [AuthController::class, 'login']);

    $app->get('/logout', [AuthController::class, 'logout']);

    $app->get('/register', [AuthController::class, 'showRegister']);
    $app->post('/register', [AuthController::class, 'register']);

    $app->get('/profil', [AuthController::class, 'profil']);
};