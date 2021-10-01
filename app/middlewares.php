<?php

use Slim\App;

return function (App $app) {
    $error = require __DIR__ . '/../config/middleware.php';
    /**
     */
    $app->addErrorMiddleware(
        $error['error_details']['displayErrrorDetails'],
        $error['error_details']['logErrorDetails'],
        $error['error_details']['logErrors'],
    );

    $app->add(new \Tuupola\Middleware\JwtAuthentication([
        "ignore" => ["/api/login", "/api/register"],
        "secret" => env("JWT_SECRET"),
        "error" => function ($response, $arguments) {
            $data['susscess'] = false;
            $data['response'] = $arguments['message'];
            $data['status_code'] = "401";

            return $response->withHeader('Content-type', "application/json")
                ->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        }
    ]));

    // $app->add(function ($req, $res, $next) {
    //     $response = $next($req, $res);
    //     $response->withHeader('Access-Control-Allow-Origin', "*")
    //         ->withHeader('Access-Control-Allow-Header', 'X-Requested-With,Content-Type,Accept,Origin,Authorization')
    //         ->withHeader('Access-Control-Allow-Methods', 'GET,POST,PUT,PATH,OPTION,DELETE')
    //         ->wittHeader('Acecess-Control-Credentails', "True");
    // });
};
