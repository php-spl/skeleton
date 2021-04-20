<?php

namespace App\Auth\Http\Middleware;

use Web\Http\Interfaces\MiddlewareInterface;


class Authenticate implements MiddlewareInterface
{

  public function handle($request, $next)
  {
    if(!app('Auth')) {
      return true;
    }

    if(!session('user')) {
      return redirect('login');
    }

    return $next($request);
  }
}