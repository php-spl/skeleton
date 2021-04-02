<?php

namespace App\Host;

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