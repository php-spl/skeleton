<?php

use Web\App\Container;
use Web\Database\Connection;
use Web\Database\Model;
use Web\Database\SQL;

return [

    'DB' => Connection::factory(Config('database.connections.' . env('DB_DRIVER', 'mysql'))),

    'Model' => function(Container $c) {
        return new Model($c->DatabaseDB);
    },

    'SQL' => function() {
        return new SQL;
    }

];