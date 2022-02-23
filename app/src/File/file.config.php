<?php

use Spl\DI\Container;
use Spl\Filesystem\View;
use Spl\Filesystem\Image;
use Spl\Filesystem\Upload;
use Spl\Filesystem\Zip;

return [
    
    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Of course
    | the usual view path has already been registered for you.
    |
    */

    'view' => function(Container $c) {
        $view = new View;
        $view->path = $c->config->get('app.view.path');
        return $view;
    },

    'image' => function() {
        return new Image;
    },

    'upload' => function(Container $c) {
        return new Upload($c->config->get('app.upload.path'));
    },

    'zip' => function() {
        return new Zip;
    }
    
];