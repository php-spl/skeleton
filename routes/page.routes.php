<?php
use App\Page\Http\Controllers\PageController;

router()->get('/', function() {
    echo '<h1>Hello World!</h1>';
})->name('home');



router()->resource('pages', PageController::class);