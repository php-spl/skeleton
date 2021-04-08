<?php

use App\Auth\AuthController;
use App\Auth\SSO\SSOController;

// User auth
router()->get('/login', function() {
    controller(Auth::class)->login();
})->name('login');

router()->post('/auth', AuthController::class . '@auth')->name('login.auth');
router()->get('/logout', AuthController::class . '@logout')->name('logout');

// SSO auth
router()->get('/sso/login', SSOController::class . '@login')->name('sso.login');
router()->post('/sso/auth', SSOController::class . '@auth')->name('sso.auth');
router()->get('/sso/logout', SSOController::class . '@logout')->name('sso.logout');
