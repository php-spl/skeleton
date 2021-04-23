<?php

use Spl\App\Container;
use Spl\App\Translator;

return [

    'App' => Container::class,
    
    'Translator' => function() {
        $translator = new Translator;
        $translator->setLocalesDir(resource_path('/locales'));
        $translator->setDefaultLanguage(config('app.locale'));
        return $translator;
    }

];