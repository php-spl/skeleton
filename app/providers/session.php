<?php

use Spl\App\Container;
use Spl\Session\NativeSession;
use Spl\Session\PDOSession;
use Spl\Globals\Cookie;

return [

   'Session' => NativeSession::class,

   'Sessions' => function(Container $c) {
      $session = new PDOSession($c->DB->pdo, [
         'table_name' => 'sessions'
      ]);
      return $session;
   },

   'Cookie' => Cookie::class
   
];