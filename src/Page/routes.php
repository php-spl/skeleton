<?php
use App\Page\Http\Controllers\PageController;

router()->get('/', PageController::class . '@index')->name('home');
