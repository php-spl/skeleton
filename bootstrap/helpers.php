<?php

function app() {
  global $app;
  return $app;
 }

 function db($model = null) {
  global $app;
  if($model) {
    return $app->{$model};
  } else {
    return $app->model;
  }
  
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

 function __() {
   
 }

 function url($path = '') {
  global $app;
  echo $app->config->get('app.url') . $path;
 }

 function router() {
  global $app;
  return $app->router;
 }

 function layout($include) {
  global $app;
  include_once $app->config->get('app.views') . '/layouts/' . $include . '.php';
 }

 function config($path) {
  global $app;
  return $app->config->get($path);
 }

 function request() {
   global $app;
   return $app->request;
 }

 function session() {
  global $app;
  return $app->session;
}

function auth() {
  global $app;
  if($app->Authenticate) {
    return $app->auth;
  }
}

 function asset($path = '', $public = '/public/assets/') {
  global $app;
  echo $app->config->get('app.url') . $public . $path;
}

 function view($path, $data = []) {
   global $app;
   return $app->view->render($path, $data);
 }

 function password($password) {
  return password_hash($password, PASSWORD_DEFAULT);
 }

 function csrf() {
  global $app;
  $app->csrf->setToken();
  echo $app->csrf->input();
}
 
 function redirect($url) {
  global $app;
  return header('Location: ' . $app->config->get('app.url') . $url);
 }

 function dump() {
   return var_dump(func_get_args());
 }

 function halt() {
  return var_dump(func_get_args());
  exit();
}