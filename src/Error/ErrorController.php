<?php

namespace App\Error;

use Web\Http\Controller;

class ErrorController extends Controller
{
    public function error($code)
    {
        view("errors/{$code}", [
            'title' => "ERROR {$code}"
        ]);
    }
    
}