<?php

use Spl\DI\Container;
use Spl\Globals\Server;
use Spl\Globals\Session;
use Spl\Globals\Cookie;
use Spl\Security\DBSession;
use Spl\Globals\Request;
use Spl\Globals\Response;
use Spl\Globals\File;
use Spl\Globals\Get;
use Spl\Globals\Post;

return [

   'server' => Server::class,

   'files' => File::class,

   'get' => Get::class,

   'post' => Post::class,

   'request' => function(Container $c) {
      return new Request(
          $c->server,
          $c->session,
          $c->cookie,
          $c->files,
          $c->post,
          $c->get
      );
  },

  'response' => Response::class,
  
  'session' => Session::class,

   'dbsession' => function(Container $c) {
      $session = new DBSession($c->db->pdo, [
         'table_name' => 'sessions'
      ]);
      return $session;
   },

   'cookie' => Cookie::class
   
];