<?php

return [
    'app' => [
        'name' => 'App',
        'key' => '_csrf',
        'path' => ABSPATH,
        'views' => ABSPATH . '/resources/views',
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
    'router' => [
        'base_folder' => ABSPATH . DIRECTORY_SEPARATOR,
        'main_method' => 'index',
        'paths' => [
            'controllers' => 'app/Http/Controllers',
            'middlewares' => 'app/Http/Middlewares',
        ],
        'namespaces' => [
            'controllers' => 'App\Http\Controllers',
            'middlewares' => 'App\Http\Middlewares',
        ]
    ],
    'mail' => [
        'host' => 'smtp.mail.com'
    ]
];