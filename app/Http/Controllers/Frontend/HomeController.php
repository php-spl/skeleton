<?php

namespace App\Http\Controllers;

use Web\Http\Controller;

class HomeController extends Controller
{
    public function index()
    {
        view('frontend/home');
    }
}