<?php

/*
|--------------------------------------------------------------------------
| Bind Important Services
|--------------------------------------------------------------------------
|
| Next, we need to bind some important services into the container so
| we will be able to resolve them when needed. 
|
*/

$services = require_once ABSPATH . '/config/services.php';

require_once ABSPATH . '/bootstrap/functions.php';

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$services->Session->start();

$app = new Web\MVC\App($services);

$app->setPath($services->Config->get('app.controllers'));

return $app;