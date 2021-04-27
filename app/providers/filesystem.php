<?php

use Spl\DI\Container;
use Spl\Filesystem\View;
use Spl\Filesystem\Image;
use Spl\Filesystem\Upload;
use Spl\Filesystem\Zip;

return [

   'view' => function(Container $c) {
        $view = new View;
        $view->path = $c->config->get('filesystem.view.path');
        return $view;
    },

    'image' => function() {
        return new Image;
    },

    'upload' => function(Container $c) {
        return new Upload($c->config->get('filesystem.upload.path'));
    },

    'zip' => function() {
        return new Zip;
    }

];