<?php

use Web\DI\DIContainer;

// Load config
$app->set('config', function() {
    $config = new Web\Config\Config;
    $config->load(ABSPATH . '/config/app.php');
    return $config;
});

// Load sesion
$app->set('session', function() {
    return new Web\Session\NativeSession;
});

// Load CSRF
$app->set('csrf', function(DIContainer $c) {
   return new Web\Security\CSRF($c->config->get('app.key'));
});

// Load view
$app->set('view', function(DIContainer $c) {
    $view = new Web\MVC\View($c);
    $view->setViewsPath(ABSPATH . '/resources/views/');
    return $view;
});

// Load cache
$app->set('cache', function(DIContainer $c) {
    $cache = new Web\Cache\FileCache(ABSPATH . '/storage/cache'); 
    #$cache = new Web\Cache\PDOCache($pdo, "my_cache_table_name");
    #$cache = new Web\Cache\ArrayCache(); 
    return $cache;
});

// Load error handler
$app->set('errors', function() {
    return new Web\Log\Errors;
});

// Load error handler
$app->set('db', function(DIContainer $c) {
    return new Web\Database\Database($c->config->db);
});

// Load validator
$app->set('validator', function(DIContainer $c) {
    return new Web\Security\Validator($c->db, $c->errors);
});

// Load auth
$app->set('auth', function(DIContainer $c) {
    return new Web\Security\Auth($c->user);
});

// Load router
$app->set('router', function(DIContainer $c) {
    $app = new Web\MVC\App($c);
    $app->controller = 'Home';
    $app->setPath($c->config->get('app.controllers'));
    return $app;
});
