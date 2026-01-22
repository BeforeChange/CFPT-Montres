<?php

use Cfpt\Montres\Controllers\HomeController;

return function ($app) {
    $app->get('/', [HomeController::class, 'show']);
};