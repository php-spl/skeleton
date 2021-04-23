<?php

use Spl\App\Container;
use Spl\Cache\FileCache;
use Spl\Cache\PDOCache;
use Spl\Cache\ArrayCache;

return [

    'FileCache' => function() {
        $cache = new FileCache(storage_path('cache/')); 
        return $cache;
    },

    'PDOCache' => function(Container $c) {
        $cache = new PDOCache($c->DB->pdo, config('cache.table'));
        return $cache;
    },

    'ArrayCache' => ArrayCache::class,

    'Cache' => function(Container $c) {
        $driver = ucfirst(config('cache.driver'));
        return $c->{$driver.'Cache'};
    }
 
];