<?php

function e($string, $escape = true) {
  if($escape) {
    echo htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
  } else {
    echo $string;
  }
 
 }

 function url($path = '') {
   global $container;
   echo $container->Config->get('app.url') . $path;
 }

 function csrf() {
  global $container;
  echo $container->CSRF;
}
 
 function redirect($url) {
   return header('Location: ' . $url);
 }

 function dump() {
   return var_dump(func_get_args());
 }