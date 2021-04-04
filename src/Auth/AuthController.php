<?php

namespace App\Auth;

use Web\Http\Controller;
use Web\Security\Hash;

use App\Auth\HMACService as HMAC;

use App\Middleware\VerifyCSRF;

use App\Host\HostModel as Host;
use App\User\UserModel as User;

use function parse_url;
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
       VerifyCSRF::handle();
    }

    public function index() 
    {
        if(request()->get('auth')) {
            if(!$this->hmacLogin()) {
                session()->set('error', 'Error in SSO login!');
                return redirect('login.broker');
            }
        }

        view('auth/login');
    }
    
    public function broker() 
    {
        view('auth/broker', [
            'title' => 'SSO Login'
        ]);
    }

    protected function authenticate($usernameOrEmail, $password)
    {
        $remember = false;
        if(request()->get('remember')) {
            $remember = true;
        }

        if(isset($usernameOrEmail) && isset($password)) {
            return auth()->attempt($usernameOrEmail, $password, $remember);
        }
        return false;
    }

    public function hmacLogin()
    {
        $hmac = new HMAC;

        if(request()->get('user_id')) {
            $user_id = request()->get('user_id');
            $target = $hmac->parseUrl(request()->get('src'));
            $host = Host::factory()->getHost($target['host']);

            // See if they have the right signature
            $user = $user_id . request()->get('user_name') . $host->secret;
            $check = Hash::equals($user, request()->get('sig'));

            if($check) {
                if(session()->has('user')) {
                    session()->delete('user');
                }
                session()->set('user', $user_id);
                return redirect('profile');
            } else {
                session()->set('error', 'Hash does not match!');
                return redirect('login.broker');
            }
        }
        return false;
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

           $auth = $this->authenticate(request()->get('username'), request()->get('password'));

            if($auth) {
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

            $auth = auth()->attempt(request()->get('username'), request()->get('password'));
            $target = $this->validateDomain(request()->get('src'));
            $host = Host::factory()->getHost($target['host']);

            if($auth && $target && $host) {
                // Generate signature from authentication info + secret key
                $hmac = HMAC::validate(auth()->user()->id, auth()->user()->username, $host->secret);

                $url = $target['url'] . "?auth=hmac&src={$target['url']}&user_id={$hmac['user_id']}&user_name={$hmac['user_name']}&sig={$hmac['sig']}";

                return redirect($url);
            } else {
                session()->set('error', 'Wrong credentials or user not registered!');
                return redirect($target['url'] . '?auth_error=1');
            }
        } else {
            session()->set('errors', $v->errors()->get());
            return redirect('login.broker');
        }
    }

    protected function validateDomain($src)
    {
        $source = parse_url($src);

        if($source) {
            $target['url'] = $source['scheme']. '://' .$source['host'].$source['path'];
            $target['host'] = $source['host'];
            return $target;
        }
        return false;
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
           $user = User::factory()->insert([
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