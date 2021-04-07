<?php

Router()->get('/', function() {
    controller(Page::class)->index();
 })->name('home');
