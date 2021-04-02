<?php

use Web\App\Container;

$app->set('User', function(Container $c) {
   return new App\User\UserModel($c->db);
});

