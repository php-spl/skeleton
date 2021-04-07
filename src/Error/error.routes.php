<?php

Router()->get('/error/404', function(){
	return controller('Error')->error(404);
})->name('404');
