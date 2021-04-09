<?php

namespace App\Page;

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