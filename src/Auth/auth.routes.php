<?php

// SSO auth
router()->get('/auth/broker', function() {
    return controller(Auth::class)->broker();
})->name('login.broker');

router()->post('/auth/idp', function() {
    return controller(Auth::class)->idp();
})->name('login.idp');
