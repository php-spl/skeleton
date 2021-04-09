<?php

namespace App\Error\Http\Controllers;

use Web\Http\Controller;

class ErrorController extends Controller
{
    public function error($code)
    {
        app('Response')->set($code);

        view("error/{$code}", [
            'title' => "ERROR {$code}"
        ]);
    }
    
}