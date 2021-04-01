<?php

// SSO auth
router()->get('/login/broker', function() {
    return controller(Api\SSO::class)->broker();
})->name('login.broker');

router()->post('/login/idp', function() {
    return controller(Api\SSO::class)->idp();
})->name('login.idp');
