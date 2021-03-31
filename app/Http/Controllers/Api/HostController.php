<?php

namespace App\Http\Controllers\Api;

use Web\Http\Controller;

class HostController extends Controller
{
    public function index() 
    {
        view('frontend/welcome', [
            'title' => 'Hello World!'
        ]);
    }
}