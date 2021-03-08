<?php

$container = new Web\DI\Container;


$container->set('Config', new Web\Config\Config());
$container->Config->load(ABSPATH . '/app/config/app.php');

$container->set('View', new Web\MVC\View);

$container->set('Errors', new Web\Log\Errors);

$container->set('DB', new Web\Database\Database(
    $container->Config->db
    )
);


$container->set('Validator', new Web\Security\Validator(
    $container->DB,
    $container->Errors
));

return $container;