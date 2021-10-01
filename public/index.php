<?php

/**
 * Autoload global dependencies and allows for autoloading local dependencies via use
 */
require_once __DIR__ . '/../vendor/autoload.php';


/**
 * Boot up application, AKA Turn the lights on.
 */
$app = require __DIR__ . '../../bootstrap/index.php';

/**
 * Passsing our Request throught the app
 */
$app->run();
