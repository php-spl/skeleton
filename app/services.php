<?php

use Web\App\Container;


// Translator
$app->set('Translator', function() {
    $translator = new Web\App\Translator;
    $translator->setLocalesDir(resource_path('locales'));
    $translator->setDefaultLanguage('en-US');
    return $translator;
});

// Cookie
$app->set('Cookie', Web\Session\Cookie::class);

// Session
$app->set('Session', Web\Session\NativeSession::class);
$app->Session->start();

// CSRF
$app->set('CSRF', function(Container $c) {
   return new Web\Security\CSRF($c->Config->get('app.key'));
});

// View
$app->set('View', function() {
    $view = new Web\Filesystem\View;
    $view->path = resource_path('views/');
    return $view;
});

// Cache
$app->set('Cache', function(Container $c) {
    $cache = new Web\Cache\FileCache(app_path('storage/cache')); 
    #$cache = new Web\Cache\PDOCache($pdo, "my_cache_table_name");
    #$cache = new Web\Cache\ArrayCache(); 
    return $cache;
});

// Error handler
$app->set('Error', function() {
    return new Web\Error\ErrorHandler;
});

// DB connection
$app->set('DB', Web\Database\Connection::factory($app->config->db));

// Database
$app->set('Model', function(Container $c) {
    return new Web\Database\Model($c->DB);
 });

// SQL
$app->set('SQL', function() {
   return new Web\Database\SQL;
});

// Validator
$app->set('Validator', function(Container $c) {
    return new Web\Security\Validator($c->Model, $c->Error);
});

// Auth
$app->set('Auth', function(Container $c) {
    return new Web\Security\Auth(
        $c->User,
        $c->Session,
        $c->Cookie
    );
});

// Hash
$app->set('Hash', function(Container $c) {
    return new Web\Security\Hash;
});

// Request
$app->set('Request', function() {
    return new Web\Http\Request;
});

// Response
$app->set('Response', function(Container $c) {
    $response = new Web\Http\Response;
    $response->baseUrl = Config('app.url');
    return $response;
});

// Router
$app->set('Router', function() {
    $router = new Web\Http\Router;
    $router->setup(Config('app.url'));
    return $router;
});
