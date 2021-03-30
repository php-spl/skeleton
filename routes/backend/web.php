<?php

use App\Http\Middlewares\{Authenticate};

router()->get('/admin', function() {
  Authenticate::handle();
   return controller(Backend\Admin::class)->index();
 });

// Posts
router()->get('/admin/posts', function() {
   return controller(Post::class)->index();
 });

 router()->get('/admin/post/create', function() {
   return controller(Post::class)->create();
 });

 router()->post('/admin/post', function() {
   return controller(Post::class)->store();
 });


