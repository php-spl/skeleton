<?php

use Web\App\Container;

return [

   'Session' => Web\Session\NativeSession::class,

   'Sessions' => function(Container $c) {
      $session = new Web\Session\PDOSession($c->DB->pdo, [
         'table_name' => 'sessions'
      ]);
      return $session;
   },

   'Cookie' => Web\Session\Cookie::class
   
];