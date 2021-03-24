<?php

use Web\DI\Container;

$app->set('Authenticate', function() {
   return new App\Http\Middlewares\Authenticate;
});

$app->set('VerifyCSRF', function() {
    return new App\Http\Middlewares\VerifyCSRF;
 });