<?php

use App\Auth\Http\Middleware\Authenticate;
use App\Post\Http\Controllers\PostController;

// Posts
router()->get('/posts', PostController::class . '@index')->name('posts');
 
router()->prefix('post/', function() {
    router()->post('store', PostController::class . '@store')->name('post.store');
      
     router()->get('create', PostController::class . '@create')->name('post.create');
       
     router()->get('{id}', PostController::class . '@show')->name('post.show',);
      
});

 