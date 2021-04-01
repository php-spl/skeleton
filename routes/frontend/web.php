<?php

use App\Http\Middlewares\{VerifyCSRF, Authenticate};


router()->get('/', function() {
   return controller('Default')->index();
})->name('default');

router()->get('/home', function() {
   return controller(Frontend\Home::class)->index();
 })->name('home');


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

