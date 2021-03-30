<?php

namespace App\Http\Controllers\Api;

use Web\Http\Controller;
use App\Http\Middlewares\VerifyCSRF;

class SSOController extends Controller
{
    public $url = [
        'login' => '/auth/sso/broker',
        'register' => '/register'
    ];

    public function __construct()
    {
       VerifyCSRF::handle();
    }
    
    public function broker() 
    {
        view('auth/sso/broker', [
            'title' => 'SSO'
        ]);
    }

    public function idp() 
    {
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

            $src = request()->get('src');
            $host = $this->validateHost($src);

            if($auth && $host) {
                // Generate signature from authentication info + secret key
                $user_id = auth()->id;
                $user_name = auth()->username;
                $key = config('app.key');

                $sig = hash(
                    'sha256',
                    $user_id . $user_name . $key
                );

               return redirect($src . "?user_id={$user_id}&user_name={$user_name}&sig={$sig}");
            } else {
                return redirect($src . '?error=1');
            }
        } else {
            session()->set('errors', $v->errors()->get());
            return redirect($this->url['login']);
        }
    }

    protected function validateHost($request)
    {

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