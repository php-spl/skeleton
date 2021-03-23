<?php

namespace App\Http\Controllers;

use Web\Router\Http\Controller;

class PostController extends Controller
{
    /**
    * @var array Before Middlewares
    */
    public $middlewareBefore = [
        \AuthMiddleware::class
    ];

    /**
    * @var array After Middlewares
    */
    public $middlewareAfter = [
        
    ];


    public function index() 
    {
        view('home');
    }

    public function getCreate()
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