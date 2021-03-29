<?php

router()->get('/admin', function() {
   return controller('Backend\Admin')->index();
 });

// Posts
router()->get('/admin/posts', function() {
   return controller('Backend\Post')->index();
 });

 router()->get('/admin/post/create', function() {
   return controller('Backend\Post')->create();
 });

 router()->post('/admin/post', function() {
   return controller('Backend\Post')->store();
 });


