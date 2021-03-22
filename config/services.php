<?php

use Web\DI\DIContainer;

// Load container
$container = new DIContainer;

// Load config
$container->set('config', function() {
    $config = new Web\Config\Config;
    $config->load(ABSPATH . '/config/app.php');
    return $config;
});

// Load sesion
$container->set('session', function() {
    return new Web\Session\NativeSession;
});

// Load CSRF
$container->set('csrf', function(DIContainer $c) {
   return new Web\Security\CSRF($c->config->get('app.key'));
});

// Load view
$container->set('view', function(DIContainer $c) {
    $view = new Web\MVC\View($c);
    return $view->setViewsPath(ABSPATH . '/app/views/');
});

// Load error handler
$container->set('errors', function() {
    return new Web\Log\Errors;
});

// Load error handler
$container->set('db', function(DIContainer $c) {
    return new Web\Database\Database($c->config->db);
});

// Load validator
$container->set('validator', function(DIContainer $c) {
    return new Web\Security\Validator($c->db, $c->errors);
});


return $container;