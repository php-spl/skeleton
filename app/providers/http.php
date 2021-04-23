<?php

use Spl\App\Container;
use Spl\Http\Router;
use Spl\Globals\Request;
use Spl\Http\Response;
use Spl\Http\Middleware;

return [

    'Request' => function() {
        return new Request;
    },

    'Response' => function() {
        $response = new Response;
        $response->baseUrl = config('app.url');
        return $response;
    },

    'Middleware' => function() {
        $middleware = new Middleware([
            new App\Provider\Http\Middleware\VerifyCSRF
        ]);
        return $middleware;
    },

    'Router' => function(Container $c) {
        $router = new Router;
        $router->setup(config('app.url'), $c->Middleware);
        return $router;
    }

];