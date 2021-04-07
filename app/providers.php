<?php

use Web\App\Container;

/*
|--------------------------------------------------------------------------
| Autoloaded Service Providers
|--------------------------------------------------------------------------
|
| The service providers listed here will be automatically loaded on the
| request to your application. Feel free to add your own services to
| this array to grant expanded functionality to your applications.
|
*/

return [

    // App container
    'App' => Web\App\Container::class,

    // Error handler
    'Error' => function() {
        return new Web\Error\ErrorHandler;
    },

    // Cookie singleton
    'Cookie' => Web\Session\Cookie::class,

    // Session singleton
    'Session' => Web\Session\NativeSession::class,

    // View
    'View' => function() {
        $view = new Web\Filesystem\View;
        $view->path = resource_path('views/');
        return $view;
    },

    // Cache
    'Cache' => function(Container $c) {
        $cache = new Web\Cache\FileCache(storage_path('cache/')); 
        #$cache = new Web\Cache\PDOCache($c->DB->pdo, "my_cache_table_name");
        #$cache = new Web\Cache\ArrayCache(); 
        return $cache;
    },

    // CSRF middleware
    'CSRF' => function(Container $c) {
        return new Web\Security\CSRF(Config('app.key'));
     },

    // Translater
    'Translator' => function() {
        $translator = new Web\App\Translator;
        $translator->setLocalesDir(resource_path('/locales'));
        $translator->setDefaultLanguage(env('APP_LOCALE', 'en-US'));
        return $translator;
    },

    // Database connections
    'DB' => Web\Database\Connection::factory(Config('database.connections.' . env('DB_DRIVER', 'mysql'))),

    // Database model
    'Model' => function(Container $c) {
        return new Web\Database\Model($c->DB);
    },

    // SQL
    'SQL' => function() {
        return new Web\Database\SQL;
    },

    // Validator
    'Validator' => function(Container $c) {
        return new Web\Security\Validator($c->Model, $c->Error);
    },

    // Authentication
    'Auth' => function(Container $c) {
        return new Web\Security\Auth(
            $c->User,
            $c->Session,
            $c->Cookie
        );
    },

    // Hashing
    'Hash' => function() {
        return new Web\Security\Hash;
    },

    // Request
    'Request' => function() {
        return new Web\Http\Request;
    },

    'Response' => function() {
        $response = new Web\Http\Response;
        $response->baseUrl = Config('app.url');
        return $response;
    },

    'Router' => function() {
        $router = new Web\Http\Router;
        $router->setup(Config('app.url'));
        return $router;
    }

];