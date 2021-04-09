<?php

return [

    
    'CSRF' => function() {
        return new Web\Security\CSRF(config('app.key'));
    }

];