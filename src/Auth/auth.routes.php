<?php

// SSO auth
router()->get('/auth/broker', function() {
    return controller(Auth::class)->broker();
})->name('login.broker');

router()->post('/auth/idp', function() {
    return controller(Auth::class)->idp();
})->name('login.idp');

// User auth
router()->get('/login', function() {
    return controller(Auth::class)->index();
 })->name('login');
 
 router()->post('/login', function() {
    return controller(Auth::class)->login();
 });

router()->get('/logout', function() {
    auth()->logout();
    redirect('login');
 })->name('logout');
