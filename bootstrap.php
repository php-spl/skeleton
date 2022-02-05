<?php

/*
|--------------------------------------------------------------------------
| Register Constants
|--------------------------------------------------------------------------
|
| These are the main constants required to make the application work. 
| You are welcome to register your own here or elsewhere.
|
*/

define('ROOT_PATH', dirname(__FILE__));

define('APP_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require_once ROOT_PATH . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new application instance
| which serves as the "glue" for all the components of the web app, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Spl\DI\Container;

/*
|--------------------------------------------------------------------------
| Setup Helper Functions
|--------------------------------------------------------------------------
|
| Next, we need to setup helper functions for easier development.
|
*/

require_once ROOT_PATH . '/helpers.php';

/*
|--------------------------------------------------------------------------
| Setup environment and load Config
|--------------------------------------------------------------------------
|
| Load environment and load Config files
|
*/

$env = ROOT_PATH . '/env.ini';

if(file_exists($env)) {

    $_ENV = parse_ini_file($env, true);

    foreach(glob(config_path('*.php')) as $config) {
       $_ENV[pathinfo($config, PATHINFO_FILENAME)] = require $config;    
    }
    
    // Config
    $app->set('config', function() {
        $config = new Spl\App\Config;
        $config->load($_ENV);
        return $config;
    });
}

/*
|--------------------------------------------------------------------------
| Autoload Service Providers
|--------------------------------------------------------------------------
|
| The service providers listed in the "app" folder will automatically be loaded on the
| request to your application. Feel free to add your own services to
| the "app" folders as arrays to grant expanded functionality to your applications.
|
*/

foreach(glob(app_path('*.php')) as $service_provider) {
    $services[] = require $service_provider;     
}

foreach($services as $name => $provider) {
    if(is_array($provider)) {
        foreach($provider as $alias => $service) {
            $app->set($alias, $service);
        }
    }
}

/*
|--------------------------------------------------------------------------
| Setup proxies and autoloading
|--------------------------------------------------------------------------
|
| Now we setup simple interfaces with proxies to the container.
|
*/

use Spl\DI\Proxy;
Proxy::setProxyApplication($app);

use Spl\DI\Alias;
Alias::getInstance($app->config->get('alias'))->register();
Alias::getInstance();

/*
|--------------------------------------------------------------------------
| Bind Routes
|--------------------------------------------------------------------------
|
| Next, we need to bind routes to the router so
| we will be able to resolve them when needed. 
|
*/

require_once src_path('/Domain/Admin/admin.routes.php');
require_once src_path('/Domain/Auth/auth.routes.php');
require_once src_path('/Domain/Error/error.routes.php');
require_once src_path('/Domain/Host/host.routes.php');
require_once src_path('/Domain/Page/page.routes.php');
require_once src_path('/Domain/Post/post.routes.php');
require_once src_path('/Domain/User/user.routes.php');


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
