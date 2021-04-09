<?php

namespace App\Page\Http\Controllers;

use Web\Http\Controller;

class PageController extends Controller
{
    public function index()
    {
        view('page/welcome', [
            'title' => 'Home'
        ]);
    }
}