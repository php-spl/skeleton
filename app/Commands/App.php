<?php

namespace App\Commands;

use Web\Console\Command;

class App extends Command
{
    public function getConfig(): array
    {
        return [
            "name" => "App",
            "version" => "1.0.0",
            "authors" => "Web Framework",
            "description" => "A command to do something",
            
            "usage" => "Usage: ",
            "option" => [
                "short", "long", "description",
            ],
            
            
            "argumentNames" => ["firstArg", "arg2"],
            
            "optionAliases" => [
                "optAlias" => ["o", "option"],
            ],
        ];
    }
    
    public function __construct()
    {
        $config = $this->config;
        
        $config["tasks"] = array_merge($config["tasks"], [
            "task1" => Task1::class,
            "task2" => function(App $cmd) {
                // ...
            },
        ]);
        
        $this->config = $config;
        parent::__construct();
    }
}

class Task1 extends Command // the tasks do not need to extends Command
{  
    public function __construct() 
    {
        $this->config["name"] = "...";
        // ...
        parent::__construct();
    }
    
    // ...
}