<?php

function e($text) {
   echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
 }
 
 function redirect($url) {
   return header('Location: ' . $url);
 }

 function dump() {
   return var_dump(func_get_args());
 }