<?php

namespace App\Auth;

use Web\Http\Middleware;

class AuthMiddleware extends Middleware
{

  public static function handle()
  {
    if(!app('Auth')) {
      return true;
    }

    if(!session('user')) {
      return redirect('login');
    } else {
      return true;
    }

    return true;
  }
}