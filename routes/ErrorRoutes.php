<?php

use Cfpt\Montres\Controllers\ErrorController;

return function ($app) {
    $app->get('/error/{code:[0-9]+}', [ErrorController::class, 'show']);
};