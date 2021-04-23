<?php

use Spl\App\Container;
use Spl\Database\Connection;
use Spl\Database\Model;
use Spl\Database\SQL;

return [

    'DB' => Connection::factory(Config('database.connections.' . env('DB_DRIVER', 'mysql'))),

    'Model' => function(Container $c) {
        return new Model($c->DatabaseDB);
    },

    'SQL' => function() {
        return new SQL;
    }

];