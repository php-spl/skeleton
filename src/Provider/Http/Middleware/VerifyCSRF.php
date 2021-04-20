<?php

namespace App\Provider\Http\Middleware;

use Web\Http\Interfaces\MiddlewareInterface;

class VerifyCSRF implements MiddlewareInterface
{
  public function handle($request, $next)
  {
    if(app('CSRF')) {
      app('CSRF')->check();
    }

    return $next($request);
  }
}