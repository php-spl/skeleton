<?php

// Paths
function root_path($path = null, $default = '/') {
  if($path) {
    return ROOT_PATH . $default . $path;
  }
  return ROOT_PATH . $default;
}

function app_path($path = null, $default = 'app/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function config_path($path = null, $default = 'config/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function src_path($path = null, $default = 'src/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function public_path($path = null, $default = 'public/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function storage_path($path = null, $default = 'storage/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function cache_path($path = null, $default = 'cache/') {
  if($path) {
    return storage_path($default . $path);
  }
  return storage_path($default);
}

function upload_path($path = null, $default = 'uploads/') {
  if($path) {
    return public_path($default . $path);
  }
  return public_path($default);
}

function resource_path($path, $default = 'resources/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function database_path($path = null, $default = 'database/') {
  if($path) {
    return root_path($default . $path);
  }
  return root_path($default);
}

function layout($include, $default = 'filesystem.view.layouts') {
  return config($default) . DIRECTORY_SEPARATOR . $include . '.php';
 }

 function component($include, $default = 'filesystem.view.path') {
 return config($default) . DIRECTORY_SEPARATOR . $include . '.php';
 }

function asset($path = '', $public = '/public/assets/') {
  echo config('app.url') . $public . $path;
}
