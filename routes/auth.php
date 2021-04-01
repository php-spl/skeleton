<?php

// Normal auth
router()->get('/profile', function() {
   return controller('Auth')->profile();
})->name('profile');

router()->get('/login', function() {
   return controller('Auth')->index();
})->name('login');

router()->post('/login', function() {
   return controller('Auth')->login();
});

router()->get('/logout', function() {
   auth()->logout();
   redirect('/login');
})->name('logout');


router()->get('/register', function() {
   return controller('Auth')->create();
})->name('register');

router()->post('/register', function() {
   return controller('Auth')->store();
});


