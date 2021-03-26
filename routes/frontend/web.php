<?php

router()->get('/', function() {
   return controller('Default')->index();
});

router()->get('/home', function() {
   return controller(Home::class)->index();
 });


// Posts
router()->get('/posts', function() {
   return controller(Frontend\Post::class)->index();
 });

router()->get('/post/{id}', function($id) {
   return controller(Frontend\Post::class)->show($id);
  });

router()->get('/post/create', function() {
   return controller(Frontend\Post::class)->create();
 });

router()->post('/post/create', function() {
   return controller(Frontend\Post::class)->store();
 });

router()->get('/app', function(){
   dump(app());
});
