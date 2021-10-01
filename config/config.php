<?php

use Psr\Container\ContainerInterface;
use Dotenv\Dotenv;

return function (ContainerInterface $container) {
    /**
     * Load env
     */
    $env = Dotenv::createImmutable(base_path());
    $env->load();

    /**
     * load setting DB
     */
    $container->set('settings', function () {
        $db = require_once __DIR__ . '/database.php';
    });
};
