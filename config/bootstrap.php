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
| Setup environment
|--------------------------------------------------------------------------
|
| Check if application is in development or production mode.
|
*/

$env = ABSPATH . '/env.ini';

if(file_exists($env)) {
    $_ENV = parse_ini_file($env, true);
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

require_once ABSPATH . '/config/helpers.php';

require_once ABSPATH . '/config/services.php';

require_once ABSPATH . '/config/models.php';

require_once ABSPATH . '/config/controllers.php';

require_once ABSPATH . '/config/middlewares.php';

require_once ABSPATH . '/config/routes.php';

/*
|--------------------------------------------------------------------------
| Debug and error reporting
|--------------------------------------------------------------------------
|
| Check if development environment
|
*/
if(config('app.env') === 'devlopment') {
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

if(config('db.migrate')) {
    sql()->import(ABSPATH . '/resources/database/migrates/' . config('db.migrate'), db()->pdo);
}

if(config('db.seed')) {
    sql()->import(ABSPATH . '/resources/database/seeds/' . config('db.seed'), db()->pdo);
}
