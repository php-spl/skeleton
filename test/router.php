<?php

require '../vendor/autoload.php';

use Web\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Web\DI\DIContainer;

// Router
$app->set('router', function() {
    $router = new Web\Router\Router;
    return $router;
});



// For basic GET URI
$app->router->get('/', function(Request $request, Response $response) {
    $response->setContent('Hello World');
    return $response;

    # OR
    # return 'Hello World!';
});


$app->router->run();