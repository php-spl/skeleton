<?php

return [
    'app' => [
        'path' => ABSPATH,
        'views' => ABSPATH . '/app/views',
        'controllers' => ABSPATH . '/app/controllers/',
        'url' => ''
    ],
    'db' => [
        'host' => '127.0.0.1',
        'driver' => 'mysql',
        'dbname' => '',
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