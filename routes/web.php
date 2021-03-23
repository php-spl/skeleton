<?php

$app->router->controller('/', IndexController::class, ['name' => 'index']);

$app->router->controller('/home', HomeController::class);

$app->router->controller('/posts', PostController::class);