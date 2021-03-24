<?php

namespace App\Http\Controllers\Backend;

use Web\Http\Controller;

use App\Http\Middlewares\VerifyCSRF;
use App\Http\Middlewares\Authenticate;

class AdminController extends Controller
{
    public function __construct()
    {
        VerifyCSRF::handle();
    }

    public function index()
    {  
        //Authenticate::handle();      
        view('backend/admin/dashboard');
    }

    public function create()
    {
        echo $_GET['type'];
    }
}