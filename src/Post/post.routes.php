<?php
use App\Middleware\{VerifyCSRF, Authenticate};

// Posts
Router()->get('/posts', function() {
    return controller(Post::class)->index();
  })->name('posts');
 
  Router()->post('/post/store', function() {
   return controller(Post::class)->store();
 })->name('post.store');
 
  Router()->get('/post/create', function() {
     Authenticate::handle();
    return controller(Post::class)->create();
  })->name('post.create');
  
 Router()->get('/post/{id}', function($id) {
    return controller(Post::class)->show($id);
 })->name('post.show',);
 