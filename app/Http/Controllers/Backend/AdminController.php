<?php

namespace App\Http\Controllers\Backend;

use Web\Http\Controller;

use App\Http\Middlewares\VerifyCSRF;

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

    public function create($type)
    {
        echo $type;
    }
}