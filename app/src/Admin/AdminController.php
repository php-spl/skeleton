<?php

namespace App\Admin;

use Spl\Http\Controller;

class AdminController extends Controller
{

    public function index()
    {  
        
        view('admin/dashboard');
    }

    public function create()
    {
        
    }
}