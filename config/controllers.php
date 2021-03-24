<?php

use Web\DI\Container;

$app->set('IndexController', function() {
   return new App\Http\Controllers\IndexController;
});

$app->set('HomeController', function() {
   return new App\Http\Controllers\Frontend\HomeController;
});

$app->set('AuthController', function() {
   return new App\Http\Controllers\Frontend\AuthController;
});

$app->set('PostController', function() {
   return new App\Http\Controllers\Frontend\PostController;
});

$app->set('AdminController', function() {
   return new App\Http\Controllers\Backend\AdminController;
});