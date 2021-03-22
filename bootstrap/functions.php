<?php

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

 function app() {
  global $app;
  return $app;
 }

 function layout($include) {
  global $app;
  include_once $app->config->get('app.views') . '/layouts/' . $include . '.php';
 }

 function config($path) {
  global $app;
  return $app->config->get($path);
 }

 function asset($path = '', $public = '/public/assets/') {
  global $app;
  return $app->config->get('app.url') . $public . $path;
}

 function view($path, $data = null) {
   global $app;
   return $app->view->render($path, $data);
 }

 function csrf() {
  global $app;
  echo $app->csrf;
}
 
 function redirect($url) {
   return header('Location: ' . $url);
 }

 function dump() {
   return var_dump(func_get_args());
 }