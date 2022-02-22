<?php

/*
|--------------------------------------------------------------------------
| Bootstrap The Application
|--------------------------------------------------------------------------
|
| Next, we need to bootstrap the application.
|
*/

require_once dirname(__DIR__) . '/app/bootstrap.php';

/*
|--------------------------------------------------------------------------
| Start Session
|--------------------------------------------------------------------------
|
| Start af new session for incomming requests.
|
*/

session()->start();

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

router()->run();






