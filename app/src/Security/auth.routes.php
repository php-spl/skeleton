<?php

use App\Auth\Http\Controllers\AuthController;
use App\Auth\Http\Controllers\SSOController;

// User auth
router()->get('/login', AuthController::class . '@login')->name('login');

router()->post('/auth', AuthController::class . '@auth')->name('login.auth');
router()->get('/logout', AuthController::class . '@logout')->name('logout');

// SSO auth
router()->get('/sso/login', SSOController::class . '@login')->name('sso.login');
router()->post('/sso/auth', SSOController::class . '@auth')->name('sso.auth');
router()->get('/sso/logout', SSOController::class . '@logout')->name('sso.logout');
