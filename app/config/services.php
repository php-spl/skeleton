<?php

use Web\DI\DIContainer;

$container = new Web\DI\DIContainer;

// Framework
$container->set('config', function() {
   $config = new Web\Config\Config;
   $config->load(ABSPATH . '/app/config/app.php');
   return $config;
});

$container->set('session', function () {
    return new Web\Session\NativeSession;
});

$container->set('csrf', function(DIContainer $c) {
    $key = $c->config->get('app.key');
    $csrf = new Web\Security\CSRF($key);
    return $csrf;
});

$container->set('view', function(DIContainer $c) {
    $view = new Web\MVC\View($c);
    $view->setViewsPath(ABSPATH . '/app/Views/');
    return $view;
});

$container->set('errors', function() {
    return new Web\Log\Errors;
});

$container->set('db', function(DIContainer $c) {
    $connection = $c->config->db;
    $db = new Web\Database\Database($connection);
    return $db;
});

$container->set('validator', function(DIContainer $c) {
    $db = $c->db;
    $errors = $c->errors;
    $validator = new Web\Security\Validator($db, $errors);
    return $validator;
});



// Custom
$container->set('User', new App\Models\User($container->db));

return $container;