<?php

namespace App\Http\Middlewares;

use Web\Http\Middleware;

class Authenticate 
{
  public static function handle()
  {
    if (!app()->session->get('auth')) {
      
      $url = app()->config->get('app.url');
      app()->response->redirect($url);
      return false;
    }

    return true;
  }
}