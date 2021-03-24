<?php

return [
    'app' => [
        'env' => env('app.env', 'development'),
        'name' => env('app.name', 'App'),
        'key' => env('app.key', base64_encode('_csrf')),
        'path' => ABSPATH,
        'views' => ABSPATH . '/resources/views',
        'url' => env('app.url')
    ],
    'db' => [
        'host' => env('db.host', '127.0.0.1'),
        'driver' => env('db.driver', 'mysql'),
        'dbname' => env('db.name', 'web-app'),
        'username' => env('db.username', 'root'),
        'password' =>  env('db.password', 'mysql'),
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],
    'alias' => [
        'session' => 'session',
        ''
    ],
    'router' => [
        'base_folder' => ABSPATH,
        'query_string' => 'route',
        'main_controller' => 'index',
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
        'host' => env('mail.host', 'smtp.mail.com')
    ]
];