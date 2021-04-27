<?php

use Spl\DI\Container;
use Spl\Database\Connection;
use Spl\Database\Model;
use Spl\Database\SQL;
use Spl\Database\ORM;

return [

    'dbconnect' => Connection::factory($app->config->get('database.connections.' . env('DB_DRIVER', 'mysql'))),

    'model' => function(Container $c) {
        return new Model($c->dbconnect);
    },

    'sql' => function() {
        return new SQL;
    },

    'db' => function(Container $c) {
        return new ORM($c->dbconnect);
    }

];