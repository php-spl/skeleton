<?php

$app->router->get('/', [
   'func' => [$app->IndexController, 'index']
]);

$app->router->get('/home', [
   'func' => [$app->HomeController, 'index']
]);


// Posts
$app->router->get('/posts', [
   'func' => [$app->PostController, 'index']
]);

$app->router->get('/post/create', [
   'func' => [$app->PostController, 'create']
]);

$app->router->post('/post', [
   'func' => [$app->PostController, 'store']
]);

$app->router->get('/app', function(){
   dump(app());
});
