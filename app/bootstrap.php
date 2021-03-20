<?php

ini_set('display_errors', true);

require_once ABSPATH . '/vendor/autoload.php';

$services = require_once ABSPATH . '/app/Config/Services.php';

$services->session->start();

require_once ABSPATH . '/app/functions.php';

$app = new Web\MVC\App($services);

$app->setPath($services->config->get('app.controllers'));

return $app;