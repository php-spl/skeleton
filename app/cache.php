<?php

use Web\App\Container;

return [

    'File' => function(Container $c) {
        $cache = new Web\Cache\FileCache(storage_path('cache/')); 
        return $cache;
    },

    'PDO' => function() {
        $cache = new Web\Cache\PDOCache($c->DB->pdo, config('cache.table'));
        return $cache;
    },

    'Array' => Web\Cache\ArrayCache::class

];