<?php

use Cfpt\Montres\Controllers\WatchesController;

return function ($app) {
    $app->get('/watches', [WatchesController::class, 'show']);
    $app->get('/watch/{id:[0-9]+}', [WatchesController::class, 'showWatch']);
};