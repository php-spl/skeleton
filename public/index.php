<?php

define('ABSPATH', dirname(__DIR__));

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

require_once ABSPATH . '/vendor/autoload.php';

require_once ABSPATH . '/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP router. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app->router->run();

