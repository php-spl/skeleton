<?php

namespace App\Http\Controllers\Frontend;

use Web\Http\Controller;

class AuthController extends Controller
{

    public function __construct()
    {
        app()->VerifyCSRF;
    }
    
    public function index() 
    {
        view('frontend/auth/login');
    }

    public function create()
    {
        view('frontend/auth/register');
    }

    public function store()
    {
        $v = app()->validator;

        $v->validate($_POST, [
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
            app()->User->insert([
                'username' => request()->get('email'),
                'email' => request()->get('email'),
                'password' => password(request()->get('password'))
            ]);
    
            session()->set('success', 'User created');
    
           return redirect('/login');

        } else {
            session()->set('errors', $v->errors()->get());
        }
    }

    public function show($id)
    {
        echo $id;
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


}