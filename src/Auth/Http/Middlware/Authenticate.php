<?php

namespace App\Auth\Http\Middleware;

use Web\Http\Middleware;

class Authenticate extends Middleware
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