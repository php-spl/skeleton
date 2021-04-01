<?php

function app($container = null) {
  global $app;
  if($container) {
    return $app->{$container};
  } else {
    return $app;
  }
 }

 function validate($src, $rules) {
   return app()->validator->validate($src, $rules);
 }

 function controller($name) {
  if($name) {
    $controller = config('http.namespaces.controllers') . DIRECTORY_SEPARATOR . $name . 'Controller';
    return new $controller;
  }
 }

 function db() {
  return app()->db;
 }

 function model($name = null) {
  if($name) {
    $model = config('db.namespace') . DIRECTORY_SEPARATOR . $name;
    return new $model(db());
  }
  if(app()->has($name)) {
    return app()->{$name};
  } else {
    return app()->model;
  }
  
 }

 function sql() {
  return app()->sql;
 }


 function env($key, $default = null) {

  $data = $_ENV;
  $segments = explode('.', $key);
  
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

function e($string, $escape = true) {
  if($escape) {
    echo htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
  } else {
    echo $string;
  }
 
 }

 function __($string, $params = []) {
   echo app()->translator->get($string, $params);
 }

 function url($path = '') {
  echo config('app.url') . $path;
 }

 function route($name, $params = []) {
  echo app()->router->link($name, $params);
 }

 function router() {
  return app()->router;
 }

 function layout($include) {
  return config('app.layouts') . DIRECTORY_SEPARATOR . $include . '.php';
 }

 function component($include) {
 return config('app.views') . DIRECTORY_SEPARATOR . $include . '.php';
 }

 function config($path) {
  return app()->config->get($path);
 }

 function response() {
  return app()->response;
}

 function request() {
   return app()->request;
 }

 function session() {
  return app()->session;
}


function auth() {
  return app()->auth;
}

 function asset($path = '', $public = '/public/assets/') {
  echo config('app.url') . $public . $path;
}

 function view($path, $data = []) {
   return app()->view->render($path, $data);
 }

 function password($password) {
  return password_hash($password, PASSWORD_DEFAULT);
 }

 function csrf() {
  if(app()->has('csrf')) {
    app()->csrf->setToken();
    echo app()->csrf->input();
  }

}
 
 function redirect($url) {
  return app()->router->redirect($url);
 }

 function dump() {
   return var_dump(func_get_args());
 }

 function halt() {
  return var_dump(func_get_args());
  exit();
}