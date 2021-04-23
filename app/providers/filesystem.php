<?php

use Spl\Filesystem\View;
use Spl\Filesystem\Image;
use Spl\Filesystem\Upload;
use Spl\Filesystem\Zip;

return [

   'View' => function() {
        $view = new View;
        $view->path = config('filesystem.view.path');
        return $view;
    },

    'Image' => function() {
        return new Image;
    },

    'Upload' => function() {
        return new Upload(config('filesystem.upload.path'));
    },

    'Zip' => function() {
        return new Zip;
    }

];