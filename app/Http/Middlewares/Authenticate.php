<?php

namespace App\Http\Middlewares;

use Web\Http\Middleware;

class Authenticate extends Middleware
{
  public static $url = [
    'login' => '/login',
    'register' => '/register',
    'profile' => '/profile'
];

  public static function handle()
  {
    if(!app()->has('auth')) {
      return true;
    }

    if(!session()->has('user')) {
      return redirect(self::$url['login']);
    } else {
      return true;
    }

    return true;
  }
}