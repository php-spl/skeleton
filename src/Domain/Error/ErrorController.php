<?php

namespace App\Error\Http\Controllers;

use Spl\Http\Controller;

class ErrorController extends Controller
{
    public function error($code)
    {
        if(!is_numeric(self::$params['code'])) {
            return redirect('error', ['code' => 404]);
        } 

        app('Response')->set($code);

        view("error/{$code}", [
            'title' => "ERROR {$code}"
        ]);
    }
    
}