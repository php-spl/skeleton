<?php

namespace App\Admin;

use Spl\Http\Controller;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {  
        auth();  
        
        view('backend/admin/dashboard');
    }

    public function create()
    {
        
    }
}