<?php

use DI\Container;
use Slim\Factory\AppFactory;




$container  = new Container();
/**
 * Load setting
 */
$setting = require_once __DIR__ . '/../config/config.php';
$setting($app);

AppFactory::setContainer($container);
$app = AppFactory::create();

/**
 * Middleware 
 */
$middleware = require_once __DIR__ . '/../app/middlewares.php';
$middleware($app);

/**
 * Router
 */
$router = require_once __DIR__ . '../../app/routes.php';
$router($app);

/**
 * config Database
 */
require_once __DIR__ . '../../config/database.php';

return $app;
