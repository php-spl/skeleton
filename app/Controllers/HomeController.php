<?php

namespace App\Controllers;

use Web\MVC\Controller;

class HomeController extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
          
    }

    public function index() 
    {
        view('home');
    }


}