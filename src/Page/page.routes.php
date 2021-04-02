<?php

router()->get('/', function() {
    return controller(Page::class)->index();
 })->name('home');
