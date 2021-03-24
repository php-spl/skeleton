<?php

namespace App\Http\Controllers\Frontend;

use Web\Http\Controller;

class HomeController extends Controller
{
    public function index()
    {
        view('frontend/home');
    }
}