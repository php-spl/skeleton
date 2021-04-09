<?php

namespace App\Admin\Http\Controllers;

use Web\Http\Controller;

use App\Provider\Http\Middleware\VerifyCSRF;

class AdminController extends Controller
{
    public function __construct()
    {
        VerifyCSRF::handle();
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