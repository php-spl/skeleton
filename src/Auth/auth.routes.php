<?php

use App\Auth\AuthController;
use App\Auth\SSO\SSOController;

// User auth
Router()->get('/login', AuthController::class . '@login')->name('login');
Router()->post('/auth', AuthController::class . '@auth')->name('login.auth');
Router()->get('/logout', AuthController::class . '@logout')->name('logout');

// SSO auth
Router()->get('/sso/login', SSOController::class . '@login')->name('sso.login');
Router()->post('/sso/auth', SSOController::class . '@auth')->name('sso.auth');
Router()->get('/sso/logout', SSOController::class . '@logout')->name('sso.logout');
