<?php

use Web\DI\DIContainer;

$app->set('user', function(DIContainer $c) {
   return new App\Models\User($c->db);
});