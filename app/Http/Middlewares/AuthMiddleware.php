<?php

namespace App\Http\Middlewares;

use Web\Router\Http\Middleware;

class AuthMiddleware extends Middleware
{
  public function handle()
  {
    if (!app()->session->get('auth')) {
      
      $url = app()->config->get('app.url');
      app()->response->redirect($url);
      return false;
    }

    return true;
  }
}