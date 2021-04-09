<?php

return [

    'Request' => function() {
        return new Web\Http\Request;
    },

    'Response' => function() {
        $response = new Web\Http\Response;
        $response->baseUrl = config('app.url');
        return $response;
    },

    'Router' => function() {
        $router = new Web\Http\Router;
        $router->setup(config('app.url'));
        return $router;
    }

];