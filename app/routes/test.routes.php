<?php

use App\Auth\Http\Middleware\Authenticate;
use App\Provider\Http\Middleware\VerifyCSRF;


router()->get('/test', function(){
   // test stuff
   dump(DB::select()->table('users')->execute());
})->middleware([new Authenticate])->name('test');

