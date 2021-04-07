<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of the web app, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Web\App\Container;

/*
|--------------------------------------------------------------------------
| Setup Helper Functions
|--------------------------------------------------------------------------
|
| Next, we need to setup helper functions for easier development.
|
*/

require_once ROOT_PATH . '/bootstrap/helpers.php';

/*
|--------------------------------------------------------------------------
| Setup environment
|--------------------------------------------------------------------------
|
| Check if application is in development or production mode.
|
*/

$env = ROOT_PATH . '/env.ini';

if(file_exists($env)) {

    $_ENV['ENV'] = parse_ini_file($env, true);

    foreach(glob(ROOT_PATH . '/config/*.php') as $config) {
        $_ENV['CONFIG'][pathinfo($config, PATHINFO_FILENAME)] = array_merge($_ENV, require $config);    
    }
    
    // Config
    $app->set('Config', function() {
        $config = new Web\App\Config;
        $config->load($_ENV['CONFIG']);
        return $config;
    });
}

/*
|--------------------------------------------------------------------------
| Bind Important Services
|--------------------------------------------------------------------------
|
| Next, we need to bind some important services into the container so
| we will be able to resolve them when needed. 
|
*/

foreach(glob(app_path('*.php')) as $service) {
    require_once $service;   
}

return dump(App()->Router);

/*
|--------------------------------------------------------------------------
| Debug and error reporting
|--------------------------------------------------------------------------
|
| Check if development environment
|
*/

if(config('app.debug')) {
    ini_set('display_errors', 'On');
    error_reporting(E_ALL ^ E_NOTICE);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

/*
|--------------------------------------------------------------------------
| Migrate database and seeds
|--------------------------------------------------------------------------
|
| If we have database to migrate, do so.
|
*/

if(Config('db.migrate')) {
    SQL()->import(database_path('migrates/') . Config('db.migrate'), DB()->pdo);
}

if(config('db.seed')) {
    SQL()->import(database_path('seeds/') . Config('db.seed'), DB()->pdo);
}

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

//return $app;