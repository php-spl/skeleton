<?php

namespace App\Controllers;

use Web\MVC\Controller;

class DefaultController extends Controller
{
    public function __construct($container)
    {
        parent::__construct($container);
          
    }

    public function index() 
    {
        $data = $this->User->where('username', 'john')->exists();

        dump($data);
    }

    public function create()
    {
        $this->User;
    }

    public function update($id)
    {
        $this->User;
    }

}