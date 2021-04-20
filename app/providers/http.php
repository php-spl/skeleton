<?php

use Web\App\Container;

return [

    'Request' => function() {
        return new Web\Http\Request;
    },

    'Response' => function() {
        $response = new Web\Http\Response;
        $response->baseUrl = config('app.url');
        return $response;
    },

    'Middleware' => function() {
        $middleware = new Web\Http\Middleware([
            new App\Provider\Http\Middleware\VerifyCSRF
        ]);
        return $middleware;
    },

    'Router' => function(Container $c) {
        $router = new Web\Http\Router;
        $router->setup(config('app.url'), $c->Middleware);
        return $router;
    }

];