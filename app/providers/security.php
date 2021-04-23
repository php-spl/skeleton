<?php

use Spl\App\Container;
use Spl\Security\CSRF;
use Spl\Security\Validator;
use Spl\Security\Auth;
use Spl\Security\Hash;
use Spl\Security\Password;
use Spl\Security\UUID;
use Spl\Security\HMAC;

use App\User\Models\User;

return [

    'CSRF' => function() {
        return new CSRF(config('app.key'));
    },

    'Validator' => function(Container $c) {
        return new Validator($c->Model, $c->Error);
    },

    'Auth' => function(Container $c) {
        return new Auth(
            User::factory(),
            $c->Session,
            $c->Cookie
        );
    },

    'Hash' => function() {
        return new Hash;
    },

    'HMAC' => function() {
        return new HMAC;
    },

    'UUID' => function() {
        return new UUID;
    },

    'Password' => function() {
        return new Password;
    }

];