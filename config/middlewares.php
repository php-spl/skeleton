<?php

use Web\App\Container;

$app->set('Authenticate', function() {
   return App\Middleware\Authenticate::handle();
});

$app->set('VerifyCSRF', function() {
    return App\Middleware\VerifyCSRF::handle();
 });