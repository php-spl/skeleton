<?php

require_once ABSPATH . '/vendor/autoload.php';

$container = require_once ABSPATH . '/app/config/container.php';

$app = new Web\MVC\App($container);

$app->setPath($container->get('Config')->get('app.controllers'));

return $app;