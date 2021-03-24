<?php

namespace App\Http\Middlewares;

use Web\Http\Middleware;

class VerifyCSRF extends Middleware 
{
  public static function handle()
  {
    if(app()->has('csrf')) {
      app()->csrf->check();
    }
    return true;
  }
}