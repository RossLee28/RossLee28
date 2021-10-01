<?php

use Slim\App;



return function (App $app) {
    /**
     * ROUTE AUTH
     */
    $route = require_once __DIR__ . '../../routes/api.php';
    $route($app);
};
