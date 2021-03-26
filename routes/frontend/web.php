<?php

$app->router->get('/', [
   'func' => [$app->DefaultController, 'index']
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

$app->router->post('/post/create', [
   'func' => [$app->PostController, 'store']
]);

$app->router->get('/post/{id}', [
   'func' => [$app->PostController, 'show'],
   'parameters' => ['id' => $id]
]);


$app->router->get('/app', function(){
   dump(app());
});
