<?php
use App\Middleware\{VerifyCSRF, Authenticate};

// Posts
router()->get('/posts', function() {
    return controller(Post::class)->index();
  })->name('posts');
 
  router()->post('/post/store', function() {
   return controller(Post::class)->store();
 })->name('post.store');
 
  router()->get('/post/create', function() {
     Authenticate::handle();
    return controller(Post::class)->create();
  })->name('post.create');
  
 router()->get('/post/{id}', function($id) {
    return controller(Post::class)->show($id);
 })->name('post.show',);
 