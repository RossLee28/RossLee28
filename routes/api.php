<?php

use Slim\Routing\RouteCollectorProxy;
use App\Http\Auth\AuthController;
use Slim\App;

return function (App $app) {
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/register', [AuthController::class, 'index']);
    });
    $app->get('/', [AuthController::class, 'index']);
};
