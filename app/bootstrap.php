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

require_once ROOT_PATH . '/app/helpers.php';

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

    $_ENV = parse_ini_file($env, true);

    foreach(glob(ROOT_PATH . '/app/config/*.php') as $config) {
       $_ENV[pathinfo($config, PATHINFO_FILENAME)] = require $config;    
    }
    
    // Config
    $app->set('Config', function() {
        $config = new Web\App\Config;
        $config->load($_ENV);
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

$services = require_once app_path('providers.php');
foreach($services as $name => $service) {
    $app->set($name, $service);
}

require_once app_path('routes.php');

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

if(config('app.env') === 'maint') {
   // return redirect('error', ['code' => 503]);
}

/*
|--------------------------------------------------------------------------
| Migrate database and seeds
|--------------------------------------------------------------------------
|
| If we have database to migrate, do so.
|
*/

if(config('db.migrate')) {
    sql()->import(database_path('migrates/') . config('db.migrate'), db()->pdo);
}

if(config('db.seed')) {
    sql()->import(database_path('seeds/') . config('db.seed'), db()->pdo);
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

return $app;