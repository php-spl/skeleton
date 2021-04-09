<?php

return [

    function() {
        $translator = new Web\App\Translator;
        $translator->setLocalesDir(resource_path('/locales'));
        $translator->setDefaultLanguage(config('app.locale'));
        return $translator;
    }

];