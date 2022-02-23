<?php

//use App\Auth\Authenticate;
use App\Admin\AdminController;
use App\Post\PostController;

router()->get('/admin', AdminController::class . '@index')->name('admin');

// Posts
router()->get('/admin/posts', PostController::class . '@index')->name('admin.posts');

router()->get('/admin/post/create', PostController::class . '@create')->name('admin.post.create');

router()->post('/admin/post', PostController::class . '@store');
 

