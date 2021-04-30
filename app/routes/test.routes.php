<?php

use App\Auth\Http\Middleware\Authenticate;
use App\Provider\Http\Middleware\VerifyCSRF;
use App\Post\Models\Post;


router()->get('/test', function(){
   // test stuff
   dump(Post::singleton()->select()->get()->results());
})->middleware([new Authenticate])->name('test');

