<?php

use Spl\DI\Container;
use Spl\Http\Router;
use Spl\Http\Middleware;

return [
    'main_controller' => 'page',
    'main_method' => 'index',
    'namespaces' => [
        'controllers' => 'App\Http\Controllers',
        'middlewares' => 'App\Http\Middleware'
    ],

    'middleware' => function() {
        $middleware = new Middleware([
            new App\Provider\Http\Middleware\VerifyCSRF
        ]);
        return $middleware;
    },

    'router' => function(Container $c) {
        $router = new Router;
        $router->setup($c->config->get('app.url'), $c->Middleware);
        return $router;
    }
];