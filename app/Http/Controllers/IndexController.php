<?php

namespace App\Http\Controllers;

use Web\Http\Controller;

class IndexController extends Controller
{
    public function index() 
    {
        view('frontend/welcome');
    }
}