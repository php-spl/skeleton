<?php
 
 router()->get('/register', function() {
    return controller('User')->create();
 })->name('register');
 
 router()->post('/register', function() {
    return controller('User')->store();
 });