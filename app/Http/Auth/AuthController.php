<?php

namespace App\Http\Auth;

class AuthController
{
    public function index($request, $response)
    {
        $body = $response->getBody();
        $body->write('Hello word');
        return $response
            ->withStatus(200);
    }
    public function create($request, $response)
    {
    }
    public function logout($request, $response)
    {
    }
}
