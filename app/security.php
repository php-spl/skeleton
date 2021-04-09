<?php

use Web\App\Container;
use Web\Security\CSRF;
use Web\Security\Validator;
use Web\Security\Auth;
use Web\Security\Hash;

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
    }

];