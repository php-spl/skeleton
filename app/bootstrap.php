<?php

ini_set('display_errors', true);

require_once ABSPATH . '/vendor/autoload.php';

$services = require_once ABSPATH . '/app/config/services.php';

$services->Session->start();

require_once ABSPATH . '/app/functions.php';

$app = new Web\MVC\App($services);

$app->setPath($services->Config->get('app.controllers'));

return $app;