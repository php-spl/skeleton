<?php

define('ABSPATH', dirname(__DIR__));

$app = require_once ABSPATH . '/app/bootstrap.php';

$app->run();

