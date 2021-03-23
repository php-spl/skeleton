<?php

namespace App\Http\Controllers;

use Web\Router\Http\Controller;

class IndexController extends Controller
{
    public function index() 
    {
        view('welcome');
    }
}