<?php

$app->router->error(function(){
	view('errors/404');
});