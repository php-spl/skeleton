<?php

use App\Auth\Http\Middleware\Authenticate;
use App\Admin\Http\Controllers\AdminController;
use App\Post\Http\Controllers\PostController;

router()->get('/admin', AdminController::class . '@index')->name('admin');

// Posts
router()->get('/admin/posts', PostController::class . '@index')->name('admin.posts');

 router()->get('/admin/post/create', PostController::class . '@create')->name('admin.post.create');

 router()->post('/admin/post', function() {
   return controller(Post::class)->store();
 });
 

