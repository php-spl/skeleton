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
$app->set('view', function() {
    $view = new Web\Filesystem\View;
    $view->path = ABSPATH . '/resources/views/';
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
$app->set('error', function() {
    return new Web\Error\ErrorHandler;
});

// Database
$app->set('db', function(DIContainer $c) {
    return new Web\Database\Connection($c->config->db);
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
    return new Web\Http\Request;
});

// Response
$app->set('response', function(DIContainer $c) {
    $response = new Web\Http\Response;
    $response->baseUrl = $c->config->get('app.url');
    return $response;
});

// Router
$app->set('router', function(DIContainer $c) {
    $router = new Web\Http\Router($c->config->get('router'));
    return $router;
});
