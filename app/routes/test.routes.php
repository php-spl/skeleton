<?php

use App\Auth\Http\Middleware\Authenticate;
use App\Provider\Http\Middleware\VerifyCSRF;

Router()->get('/test', function(){
   // test stuff

})->middleware([new Authenticate])->name('test');

