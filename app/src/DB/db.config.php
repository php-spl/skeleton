<?php

use Spl\DI\Container;
use Spl\Database\Connection;
use Spl\Database\Model;
use Spl\Database\SQL;
use Spl\Database\ORM;
use Spl\Database\Query;

return [

    'connect' => Connection::singleton($app->config->get('connection.' . env('DB_DRIVER', 'mysql'))),

    'sql' => function() {
        return new SQL;
    },

    'orm' => function(Container $c) {
        return new ORM($c->connect->pdo);
    },

    'db' => function(Container $c) {
        return new Query($c->connect->pdo);
    },

];