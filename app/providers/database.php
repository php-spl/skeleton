<?php

use Spl\DI\Container;
use Spl\Database\Connection;
use Spl\Database\Model;
use Spl\Database\SQL;
use Spl\Database\ORM;
use Spl\Database\Query;

return [

    'dbconnect' => Connection::singleton($app->config->get('database.connections.' . env('DB_DRIVER', 'mysql'))),

    'sql' => function() {
        return new SQL;
    },

    'orm' => function(Container $c) {
        return new ORM($c->dbconnect->pdo);
    },

    'db' => function(Container $c) {
        return new Query($c->dbconnect->pdo);
    }

];