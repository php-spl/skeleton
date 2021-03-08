<?php

namespace App\Controllers;

use Web\MVC\Controller;

class DefaultController extends Controller
{
    public function __construct($container)
    {
        parent::__construct($container);
          
    }

    public function index() {
        echo 'Hello there';
    }

}