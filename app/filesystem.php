<?php

return [

   'View' => function() {
        $view = new Web\Filesystem\View;
        $view->path = config('filesystem.view.path');
        return $view;
    }

];