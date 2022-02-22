<?php

use Spl\DI\Container;
use Spl\Security\Token;
use Spl\Security\Validator;
use Spl\Security\Auth;
use Spl\Security\Hash;
use Spl\Security\Password;
use Spl\Security\UUID;
use Spl\Security\HMAC;

use App\User\Models\User;

return [

    'token' => function(Container $c) {
        return new Token($c->config->get('app.key'));
    },

    'validator' => function(Container $c) {
        return new Validator($c->Model, $c->Error);
    },

    'auth' => function(Container $c) {
        return new Auth(
            User::factory(),
            $c->session,
            $c->cookie
        );
    },

    'hash' => function() {
        return new Hash;
    },

    'hmac' => function() {
        return new HMAC;
    },

    'uuid' => function() {
        return new UUID;
    },

    'password' => function() {
        return new Password;
    }

];