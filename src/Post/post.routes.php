<?php
use App\Middleware\{VerifyCSRF, Authenticate};
use App\Post\PostController;

// Posts
router()->get('/posts', PostController::class . '@index')->name('posts');
 
router()->prefix('post/', function() {
    router()->post('store', function() {
        return controller(Post::class)->store();
     })->name('post.store');
      
     router()->get('create', function() {
          Authenticate::handle();
         return controller(Post::class)->create();
     })->name('post.create');
       
     router()->get('{id}', function($id) {
         return controller(Post::class)->show($id);
     })->name('post.show',);
      
});

 