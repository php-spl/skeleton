<?php

namespace App\Middleware;

use Web\Http\Middleware;

class VerifyCSRF extends Middleware 
{
  public static function handle()
  {
    if(App()->has('CSRF')) {
      App()->CSRF->check();
    }
    return true;
  }
}