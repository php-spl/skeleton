<?php

namespace App\Http\Controllers;

use Web\MVC\Controller;

class PostController extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
          
    }

    public function index() 
    {
        view('home');
    }

    public function create()
    {
        echo 'created';
    }

    public function store()
    {

    }

    public function show($id)
    {
        echo $id;
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }

    public function delete()
    {
        
    }


}