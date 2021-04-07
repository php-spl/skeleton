<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */
        
    'App' => Web\App\Container::class,
    'Config' => function() use ($app_config) {
        $config = new Web\App\Config;
        $config->load($app_config);
         return $config;
        },
    'Translator' => function() {
        $translator = new Web\App\Translator;
        $translator->setLocalesDir(resource_path('/locales'));
        $translator->setDefaultLanguage('en-US');
        return $translator;
        },
];