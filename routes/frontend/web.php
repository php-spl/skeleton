<?php

use App\Http\Middlewares\{VerifyCSRF, Authenticate};

router()->get('/', function() {
   return controller('Default')->index();
});

router()->get('/home', function() {
   return controller(Frontend\Home::class)->index();
 });


// Posts
router()->get('/posts', function() {
   return controller(Post::class)->index();
 });

 router()->post('/post/store', function() {
  return controller(Post::class)->store();
});

 router()->get('/post/create', function() {
    Authenticate::handle();
   return controller(Post::class)->create();
 });
 
router()->get('/post/{id}', function($id) {
   return controller(Post::class)->show($id);
  });

