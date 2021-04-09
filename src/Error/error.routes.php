<?php

router()->get('/error/{code}?', function($code){
	if(is_numeric($code)) {
		return controller(Error::class)->error($code);
	} else {
		return redirect('error', ['code' => 404]);
	}
})->name('error');