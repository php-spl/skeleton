<?php

Router()->get('/test', function(){
   // test stuff
   var_dump(config('app.key'));
})->name('test');

