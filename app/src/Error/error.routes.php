<?php

use App\Error\Http\Controllers\ErrorController;

router()->get('/error/{code}?', ErrorController::class . '@error')->name('error');