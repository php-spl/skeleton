<?php

use Spl\DI\Container;
use Spl\Cache\FileCache;
use Spl\Cache\PDOCache;
use Spl\Cache\ArrayCache;

return [
    'driver' => 'file',
    'table' => 'cache', 
    'filecache' => function() {
        $cache = new FileCache(storage_path('cache/')); 
        return $cache;
    },

    'pdocache' => function(Container $c) {
        $cache = new PDOCache($c->DB->pdo, $c->config->get('cache.table'));
        return $cache;
    },

    'arraycache' => ArrayCache::class,

    'cache' => function(Container $c) {
        $driver = ucfirst($c->config->get('cache.driver'));
        return $c->{$driver.'cache'};
    }
];