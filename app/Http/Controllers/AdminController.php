<?php

namespace App\Http\Controllers;

use Web\Http\Controller;

class AdminController extends Controller
{
    public function index()
    {
        view('admin/index');
    }

    public function create()
    {
        echo $_GET['type'];
    }
}