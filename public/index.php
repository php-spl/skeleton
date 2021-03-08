<?php

session_start();

ini_set('display_errors', true);

define('ABSPATH', dirname(__DIR__));

$app = require_once ABSPATH . '/app/bootstrap.php';

$app->run();

