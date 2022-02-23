<?php

namespace App\Security;

use Spl\Http\Controller;

use function request;
use function view;
use function session;
use function redirect;
use function auth;
use function validate;

class AuthController extends Controller
{

    public function __construct()
    {
       
    }

    public function login() 
    {
        return view('auth/login', [
            'title' => 'Login'
        ]);
    }


    protected function attempt()
    {
        $remember = false;
        $username = request('username');
        $password = request('password');

        if(request('remember')) {
            $remember = true;
        }

        if($username && $password) {
            return auth()->attempt($username, $password, $remember);
        }

        return false;  
    }

    public function auth() 
    {    
       $v = validate($_POST, [
            'email' => [
                'required' => true,
                'max' => 50,
                'email' => true
            ],
            'password' => [
                'required' => true
            ]
        ]);

        if(!$v->fails()) {

            if($this->attempt()) {
               return redirect('profile');
            } else {
                session()->set('error', 'Wrong credentials!');
                return redirect('login');
            }
        } else {
            session()->set('errors', $v->errors()->get());
            return redirect('login');
        }
    }

    public function logout()
    {
        auth()->logout();
        redirect('login');
    }

}