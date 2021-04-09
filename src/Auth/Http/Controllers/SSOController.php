<?php

namespace App\Auth\Http\Controllers;

use Web\Http\Controller;

use App\Auth\Providers\HMACServiceProvider as HMAC;

use App\Provider\Http\Middleware\VerifyCSRF;

use function request;
use function view;
use function session;
use function redirect;
use function auth;
use function validate;

class SSOController extends Controller
{

    public function __construct()
    {
       VerifyCSRF::handle();
    }

    public function login() 
    {
        if(request('auth')) {
            if(HMAC::login(request('src'), request('user_id'), request('user_name'), request('sig'))) {
                return redirect('profile');
            }
        }

        return view('auth/sso', [
            'title' => 'SSO Login'
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
            'username' => [
                'required' => true
            ],
            'password' => [
                'required' => true
            ]
        ]);

        if(!$v->fails()) {
            if($this->attempt()) {
               $url = HMAC::register(request('src'), auth()->user()->id, auth()->user()->username);
               redirect($url);
            } else {
                session()->set('error', 'Wrong credentials or user not registered!');
                $target = HMAC::parseUrl(request('src'));
                return redirect($target['url'] . '?auth_error=1');
            }
        } else {
            session()->set('errors', $v->errors()->get());
            return redirect('sso.login');
        }

    }

    public function logout()
    {
        auth()->logout();
        redirect('sso.login');
    }

}