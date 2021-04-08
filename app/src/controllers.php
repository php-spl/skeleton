<?php

use Web\App\Container;

$app->set('PageController', function() {
   return new App\Page\PageController;
});

$app->set('AuthController', function() {
   return new App\Auth\AuthController;
});

$app->set('PostController', function() {
   return new App\Post\PostController;
});

$app->set('AdminController', function() {
   return new App\Admin\AdminController;
});