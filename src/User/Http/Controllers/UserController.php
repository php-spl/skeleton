<?php

namespace App\User\Http\Controllers;

use Web\Http\Controller;

use App\User\Models\User;

class UserController extends Controller
{

    public function __construct()
    {

    }
    
    public function index() 
    {
        view('user/profile');
    }

    public function create()
    {
        view('user/create');
    }

    public function store()
    {
        $v = validate($_POST, [
            'email' => [
                'required' => true,
                'max' => 50,
                'email' => true,
                'unique' => 'users'
            ],
            'password' => [
                'required' => true,
                'min' => 6
            ]
        ]);

        if(!$v->fails()) {
           $user = User::factory()->insert([
                'username' => explode('@', request()->get('email'))[0],
                'email' => request()->get('email'),
                'password' => password(request()->get('password'))
            ])->save();
    
            if($user) {
                session()->set('success', 'User created');
                session()->set('user', $user);
                return redirect('profile');
            }

        } else {
            session()->set('errors', $v->errors()->get());
            return redirect('register');
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
        view('user/profile');
    }

}