<?php

namespace App\Http\Controllers;

use Web\Http\Controller;

class AuthController extends Controller
{
    public $url = [
        'login' => '/login',
        'register' => '/register',
        'profile' => '/profile'
    ];

    public function __construct()
    {
        app()->VerifyCSRF;
    }
    
    public function index() 
    {
        view('auth/login');
    }

    public function login() 
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
           $auth = auth()->attempt(
                request()->get('email'),
                request()->get('password')
            );

            if($auth) {
               return redirect($this->url['profile']);
            } else {
                session()->set('errors', $v->errors()->get());
                return redirect($this->url['login']);
            }
        }
    }

    public function create()
    {
        view('auth/register');
    }

    public function store()
    {
        $v = validate($_POST, [
            'email' => [
                'required' => true,
                'max' => 50,
                'email' => true,
                'alnum' => true,
                'unique' => 'users'
            ],
            'password' => [
                'required' => true,
                'min' => 6
            ]
        ]);

        if(!$v->fails()) {
           $user = model('User')->insert([
                'username' => request()->get('email'),
                'email' => request()->get('email'),
                'password' => password(request()->get('password'))
            ]);
    
            if($user) {
                session()->set('success', 'User created');
                session()->set('user', $user);
                return redirect($this->url['profile']);
            }

        } else {
            session()->set('errors', $v->errors()->get());
            return redirect($this->url['register']);
        }
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }

    public function delete()
    {
        
    }

    public function profile() 
    {
        view('auth/profile');
    }


}