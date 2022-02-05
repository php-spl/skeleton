<?php

namespace App\Provider\Http\Middleware;

use Spl\Http\Interfaces\MiddlewareInterface;

class Verify implements MiddlewareInterface
{
  public function handle($request, $next)
  {
    if(app('CSRF')) {
      app('CSRF')->check();
    }

    return $next($request);
  }
}