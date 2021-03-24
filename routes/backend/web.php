<?php

$app->router->get('/admin', [
   'func' => [$app->AdminController, 'index']
]);

// Posts
$app->router->get('/admin/posts', [
   'func' => [$app->PostController, 'index']
]);

$app->router->get('/admin/post/create', [
   'func' => [$app->PostController, 'create']
]);

$app->router->post('/admin/post', [
   'func' => [$app->PostController, 'store']
]);

