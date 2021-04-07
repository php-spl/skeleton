<?php

namespace App\Middleware;

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
    if(!App()->has('Auth')) {
      return true;
    }

    if(!Session()->has('user')) {
      return redirect(self::$url['login']);
    } else {
      return true;
    }

    return true;
  }
}