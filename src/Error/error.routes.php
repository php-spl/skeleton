<?php

router()->get('/error/404', function(){
	view('errors/404');
})->name('404');
