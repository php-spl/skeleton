<?php

ini_set('display_errors', true);

require_once ABSPATH . '/vendor/autoload.php';

$container = require_once ABSPATH . '/app/config/container.php';

$container->Session->start();

require_once ABSPATH . '/app/functions.php';

$app = new Web\MVC\App($container);

$app->setPath($container->Config->get('app.controllers'));

return $app;