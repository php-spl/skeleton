<?php

namespace App\Controllers;

use Web\MVC\Controller;

class AdminController extends Controller
{

    public function __construct($container)
    {
        parent::__construct($container);
    }

    public function index() 
    {
        $this->View->render('/admin/index');
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