<?php

use Spl\DI\Container;
use Spl\Filesystem\Translator;

return [

    'app' => function() use ($app) {
        return $app;
    },
    
    'translator' => function(Container $c) {
        $translator = new Translator;
        $translator->setLocalesDir(resource_path('/locales'));
        $translator->setDefaultLanguage($c->config->get('app.locale'));
        return $translator;
    }

];