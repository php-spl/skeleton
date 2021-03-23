<?php

use Web\DI\DIContainer;

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

$app = new DIContainer;

/*
|--------------------------------------------------------------------------
| Bind Important Services
|--------------------------------------------------------------------------
|
| Next, we need to bind some important services into the container so
| we will be able to resolve them when needed. 
|
*/

require_once ABSPATH . '/config/services.php';

require_once ABSPATH . '/config/models.php';

require_once ABSPATH . '/bootstrap/functions.php';

require_once ABSPATH . '/routes/main.php';

