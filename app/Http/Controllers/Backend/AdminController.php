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
        //Authenticate::handle();
    }

    public function index()
    {        
        view('backend/admin/index');
    }

    public function create()
    {
        echo $_GET['type'];
    }
}