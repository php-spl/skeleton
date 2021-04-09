<?php

return [

    function() {
        $view = new Web\Filesystem\View;
        $view->path = config('view.path');
        return $view;
    }

];