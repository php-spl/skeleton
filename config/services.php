<?php

// Load container
$container = new Web\DI\Container;

// Load config
$container->set('config', new Web\Config\Config());
$container->Config->load(ABSPATH . '/config/app.php');

// Load sesion
$container->set('session', new Web\Session\Session);

// Load CSRF
$container->set('csrf', new Web\Security\CSRF($container->Config->get('app.key')));

// Load view
$container->set('view', new Web\MVC\View($container));
$container->View->setViewsPath(ABSPATH . '/app/views/');

// Load error handler
$container->set('errors', new Web\Log\Errors);

// Load database
$container->set('db', new Web\Database\Database(
    $container->Config->db
    )
);

// Load validator
$container->set('validator', new Web\Security\Validator(
    $container->DB,
    $container->Errors
));


return $container;