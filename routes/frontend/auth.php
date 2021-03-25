<?php

$app->router->get('/login', [
    'func' => [$app->AuthController, 'index']
 ]);

 $app->router->get('/signup', [
    'func' => [$app->AuthController, 'create']
 ]);

 $app->router->post('/signup', [
    'func' => [$app->AuthController, 'store']
 ]);