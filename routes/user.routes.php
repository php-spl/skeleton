<?php

use App\User\Http\Controllers\UserController;
 
 router()->get('/register', UserController::class . '@index')->name('register');
 
 router()->post('/register', UserController::class . '@store');

 router()->get('/profile', UserController::class . 'profile')->name('profile');