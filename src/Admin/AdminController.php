<?php

namespace App\Admin;

use Web\Http\Controller;

use App\Service\Middleware\VerifyCSRF;

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