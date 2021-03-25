<?php

namespace App\Http\Middlewares;

use Web\Http\Middleware;

class Authenticate extends Middleware
{
  public static function handle()
  {
    if(!app()->has('auth')) {
      return true;
    }

    if (!app()->session->get('user')) {
     return redirect('/');
    }

    return true;
  }
}