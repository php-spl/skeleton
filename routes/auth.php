<?php

// Normal auth
router()->get('/profile', function() {
   return controller('Auth')->profile();
});

router()->get('/login', function() {
   return controller('Auth')->index();
});

router()->post('/login', function() {
   auth();
   return controller('Auth')->login();
});


router()->get('/register', function() {
   return controller('Auth')->create();
});

router()->post('/register', function() {
   return controller('Auth')->store();
});

