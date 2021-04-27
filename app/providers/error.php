<?php

use Spl\Error\Handler;

return [

    'error' => function() {
        return new Handler;
    }
    
];