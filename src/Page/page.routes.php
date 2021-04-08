<?php

router()->get('/', function() {
    controller(Page::class)->index();
 })->name('home');
