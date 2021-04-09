<?php

use Web\App\Container;

return [

    'FileCache' => function() {
        $cache = new Web\Cache\FileCache(storage_path('cache/')); 
        return $cache;
    },

    'PDOCache' => function(Container $c) {
        $cache = new Web\Cache\PDOCache($c->DB->pdo, config('cache.table'));
        return $cache;
    },

    'ArrayCache' => Web\Cache\ArrayCache::class

];