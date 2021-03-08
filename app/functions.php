<?php

function e($text) {
    echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
 }
 
 function redirect($url){
    return header('Location: ' . $url);
 }