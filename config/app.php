<?php

return [
    'app' => [
        'name' => 'App',
        'key' => '_csrf',
        'path' => ABSPATH,
        'views' => ABSPATH . '/resources/views',
        'controllers' => ABSPATH . '/app/Controllers/',
        'url' => 'http://localhost/dev/php-web-app'
    ],
    'db' => [
        'host' => '127.0.0.1',
        'driver' => 'mysql',
        'dbname' => 'web-app',
        'username' => 'root',
        'password' => 'mysql',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],
    'mail' => [
        'host' => 'smtp.mail.com'
    ]
];