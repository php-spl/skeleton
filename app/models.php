<?php

use Web\App\Container;

$app->set('User', function(Container $c) {
   return App\User\UserModel::factory();
});

