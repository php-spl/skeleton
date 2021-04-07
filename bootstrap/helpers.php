<?php

// App
function App($container = null) {
  global $app;
  if($container) {
    return $app->{$container};
  } else {
    return $app;
  }
 }

function env($key, $default = null) {

  $data = $_ENV;
  $segments = explode('_', $key);
  
  foreach($segments as $segment) {
    if(isset($data[$segment])) {
      $data = $data[$segment];
    } else {
      $data = $default;
      break;
    }
  }
  
  return $data;
}

function Config($path) {
  if($path) {
    return app()->Config->get($path);
  }

}


// Paths
function root_path($path = null, $default = '/') {
  if($path) {
    return ROOT_PATH . $default . $path;
  }
  return ROOT_PATH . $default;
}

function src_path($path = null, $default = 'src/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function app_path($path = null, $default = 'app/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function storage_path($path = null, $default = 'public/storage/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function upload_path($path = null, $default = 'uploads/') {
  if($path) {
    return storage_path($default . $path);
  }
  return storage_path($default);
}


function resource_path($path, $default = 'resources/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}


function database_path($path = null, $default = 'database/') {
  if($path) {
    return resource_path($default . $path);
  }
  return resource_path($default);
}


// Database
function DB() {
  return app()->DB;
 }

 function model($name = null) {
  if($name) {
    $model = config('db.namespace') . DIRECTORY_SEPARATOR . ucwords($name) . DIRECTORY_SEPARATOR .  $name . 'Model';
    return new $model(db());
  }
  if(app()->has($name)) {
    return app()->{$name};
  } else {
    return app()->model;
  }
  
 }

 function SQL() {
  return app()->sql;
 }


// Views and templates
function View($path, $data = []) {
  return app()->View->render($path, $data);
}

function layout($include) {
  return config('view.layouts') . DIRECTORY_SEPARATOR . $include . '.php';
 }

 function component($include) {
 return config('view.path') . DIRECTORY_SEPARATOR . $include . '.php';
 }

function e($string, $escape = true) {
  if($escape) {
    echo htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
  } else {
    echo $string;
  }
 
 }

 function __($string, $replace = [], $locale = false) {
   if($locale) {
     app()->translator->forceLanguage($locale);
   }
   echo app()->translator->get($string, $replace);
 }

function asset($path = '', $public = '/public/assets/') {
  echo config('app.url') . $public . $path;
}

function URL($path = '') {
  echo config('app.url') . $path;
 }

 function csrf() {
  if(app()->has('csrf')) {
    app()->CSRF->setToken();
    echo app()->CSRF->input();
  }

}

// HTTP
function Router() {
  return app()->Router;
 }

 function controller($name) {
  if($name) {
    $controller = config('http.namespaces.controllers') . DIRECTORY_SEPARATOR . ucwords($name) . DIRECTORY_SEPARATOR .  $name .  'Controller';
    return new $controller;
  }
 }

function current_url() {
  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 }

function route($name, $params = []) {
  echo app()->Router->link($name, $params);
 }

 function Session() {
  return app()->Session;
}

function Request($key = false) {
  if(!$key) {
   return app()->Request;
  }
  return app()->Request->get($key);
}

function Response() {
  return app()->Response;
}

function redirect($url) {
  return app()->Router->redirect($url);
 }


// Authentication and validation
function Auth() {
  return app()->Auth;
}

function Validate($src, $rules) {
  return app()->Validator->validate($src, $rules);
}

function password($password) {
  return password_hash($password, PASSWORD_DEFAULT);
 }


 // DEBUG
 function dump() {
   return var_dump(func_get_args());
 }

 function halt() {
  return var_dump(func_get_args());
  exit();
}