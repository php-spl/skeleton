<?php

$app->router->controller('/', IndexController::class);

$app->router->controller('/home', HomeController::class);

$app->router->controller('/posts', PostController::class);