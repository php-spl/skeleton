<?php

use Web\DI\Container;

$app->set('User', function(Container $c) {
   return new App\Models\User($c->db);
});

$app->set('Post', function(Container $c) {
   return new App\Models\Post($c->db);
});