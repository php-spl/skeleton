<?php

use Web\DI\DIContainer;

// Config
$app->set('config', function() {
    $config = new Web\Config\Config;
    $config->load(ABSPATH . '/config/app.php');
    return $config;
});

// Session
$app->set('session', function() {
    return new Web\Session\NativeSession;
});

// CSRF
$app->set('csrf', function(DIContainer $c) {
   return new Web\Security\CSRF($c->config->get('app.key'));
});

// View
$app->set('view', function(DIContainer $c) {
    $view = new Web\MVC\View($c);
    $view->setViewsPath(ABSPATH . '/resources/views/');
    return $view;
});

// Cache
$app->set('cache', function(DIContainer $c) {
    $cache = new Web\Cache\FileCache(ABSPATH . '/storage/cache'); 
    #$cache = new Web\Cache\PDOCache($pdo, "my_cache_table_name");
    #$cache = new Web\Cache\ArrayCache(); 
    return $cache;
});

// Error handler
$app->set('errors', function() {
    return new Web\Log\Errors;
});

// Database
$app->set('db', function(DIContainer $c) {
    return new Web\Database\Database($c->config->db);
});

// Validator
$app->set('validator', function(DIContainer $c) {
    return new Web\Security\Validator($c->db, $c->errors);
});

// Auth
$app->set('auth', function(DIContainer $c) {
    return new Web\Security\Auth($c->user);
});

// Request
$app->set('request', function() {
    return new Symfony\Component\HttpFoundation\Request;
});

// Response
$app->set('response', function() {
    return new Symfony\Component\HttpFoundation\Response;
});

// Router
$app->set('router', function(DIContainer $c) {
    $router = new Web\Router\Router($c->config->get('router'));
    return $router;
});

// App
$app->set('app', function(DIContainer $c) {
    $app = new Web\MVC\App($c);
    $app->controller = 'Home';
    $app->setPath($c->config->get('app.controllers'));
    return $app;
});
