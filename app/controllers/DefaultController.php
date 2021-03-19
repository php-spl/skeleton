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
        $data = $this->User->where();

        dump($data);
    }

    public function create()
    {
        $this->User->create([
            'username' => 'john',
            'password' => password_hash('doe', PASSWORD_DEFAULT)
        ]);
    }

    public function update($id)
    {
        $this->User->update([
            'username' => 'john'
        ], ['id', '=', $id]
    );
    }

}