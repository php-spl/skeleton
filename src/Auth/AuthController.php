<?php

namespace App\Auth;

use Web\Http\Controller;
use Web\Security\Hash;

use App\Middleware\VerifyCSRF;

class AuthController extends Controller
{

    public function __construct()
    {
       VerifyCSRF::handle();
    }

    public function index() 
    {
        view('auth/login');
    }
    
    public function broker() 
    {
        view('auth/broker', [
            'title' => 'SSO Login'
        ]);
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

            $remember = false;
            if(request()->get('remember')) {
                $remember = true;
            }

           $auth = auth()->attempt(
                request()->get('email'),
                request()->get('password'),
                $remember
            );

            if($auth) {
               return redirect('profile');
            } else {
                session()->set('errors', $v->errors()->get());
                return redirect('login');
            }
        }
    }

    public function idp() 
    {

        $auth = auth()->attempt(
            request()->get('username'),
            request()->get('password')
        );

       $v = validate($_POST, [
            'username' => [
                'required' => true
            ],
            'password' => [
                'required' => true
            ]
        ]);

        if(!$v->fails()) {
           $auth = auth()->attempt(
                request()->get('username'),
                request()->get('password')
            );

            $host = $this->validateHost(request()->get('host'));

            if($auth && $host) {
                // Generate signature from authentication info + secret key
                $user_id = auth()->id;
                $user_name = auth()->username;
                $key = config('app.key');

                $sig = Hash::make($user_id . $user_name, $key);

               return redirect($host . "?user_id={$user_id}&user_name={$user_name}&sig={$sig}");
            } else {
                return redirect($host . '?error=1');
            }
        } else {
            session()->set('errors', $v->errors()->get());
            return redirect('login.broker');
        }
    }

    protected function validateHost($host)
    {
        return model('Host')->select()->where('host', $host)->count();
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
        view('auth/profile');
    }

}