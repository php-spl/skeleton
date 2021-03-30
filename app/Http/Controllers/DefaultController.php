<?php

namespace App\Http\Controllers;

use Web\Http\Controller;

class DefaultController extends Controller
{
    public function index() 
    {
        view('frontend/welcome', [
            'title' => 'Hello World!'
        ]);
    }
}