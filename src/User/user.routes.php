<?php

// User auth
router()->get('/user/login', function() {
    return controller('User')->index();
 })->name('login');
 
 router()->post('/user/login', function() {
    return controller('User')->login();
 });
 
 router()->get('/user/logout', function() {
    auth()->logout();
    redirect('/login');
 })->name('logout');
 
 
 router()->get('/user/create', function() {
    return controller('User')->create();
 })->name('register');
 
 router()->post('/user/store', function() {
    return controller('User')->store();
 });