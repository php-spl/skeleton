<?php

$app->router->get('/login', [
    'func' => [$app->AuthController, 'index']
 ]);

 $app->router->get('/register', [
    'func' => [$app->AuthController, 'create']
 ]);

 $app->router->post('/register', [
    'func' => [$app->AuthController, 'store']
 ]);