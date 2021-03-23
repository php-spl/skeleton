<?php

namespace App\Http\Controllers;

use Web\Http\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo app()->config->get('app.name');
    }
}