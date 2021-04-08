<?php

namespace App\Service\Middleware;

use Web\Http\Middleware;

class VerifyCSRF extends Middleware 
{
  public static function handle()
  {
    if(app('CSRF')) {
      app('CSRF')->check();
    }
    return true;
  }
}