<?php

use App\Auth\Http\Middleware\{Authenticate};

router()->get('/admin', function() {
  Authenticate::handle();
   return controller(Backend\Admin::class)->index();
 })->name('admin');

// Posts
router()->get('/admin/posts', function() {
   return controller(Post::class)->index();
 })->name('admin.posts');

 router()->get('/admin/post/create', function() {
   return controller(Post::class)->create();
 })->name('admin.posts.create');

 router()->post('/admin/post', function() {
   return controller(Post::class)->store();
 });
 

