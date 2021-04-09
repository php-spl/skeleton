<?php

// App
function app($service = null) {
  global $app;
  if($service) {
    if($app->has($service)) {
      return $app->{$service};
    } else {
      return false;
    }
  }
  return $app;
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

function config($path) {
  if($path) {
    return app('Config')->get($path);
  }

}


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


// Database
function db() {
  return app('DB');
 }

 function model($name = null) {
  if($name) {
    $model = config('db.namespace') . DIRECTORY_SEPARATOR . ucwords($name) . DIRECTORY_SEPARATOR .  $name . 'Model';
    return new $model(db());
  }
  if(app($name)) {
    return app($name);
  } else {
    return app('Model');
  }
  
 }

 function sql() {
  return app('SQL');
 }


// Views and templates
function view($path, $data = []) {
  return app('View')->render($path, $data);
}

function domain_view($path, $data = []) {
  $path = explode('/', $path);
  $domain = ucfirst($path[0]);
  unset($path[0]);
  $path = implode('/', $path);

  app('View')->path = src_path($domain . '/views');
  return app('View')->render($path, $data);
}

function layout($include, $default = 'filesystem.view.layouts') {
  return config($default) . DIRECTORY_SEPARATOR . $include . '.php';
 }

 function component($include, $default = 'filesystem.view.path') {
 return config($default) . DIRECTORY_SEPARATOR . $include . '.php';
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
     app('Translator')->forceLanguage($locale);
   }
   echo app('Translator')->get($string, $replace);
 }

function asset($path = '', $public = '/public/assets/') {
  echo config('app.url') . $public . $path;
}

function url($path = '') {
  echo config('app.url') . $path;
 }

 function csrf() {
  if(app('CSRF')) {
    app('CSRF')->setToken();
    echo app('CSRF')->input();
  }

}

// HTTP
function router() {
  return app('Router');
 }

function current_url() {
  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 }

function route($name, $params = []) {
  echo app('Router')->link($name, $params);
 }

 function session($name = null) {
   if($name) {
     if(app('Session')->has($name)) {
      return app('Session')->get($name);
     } else {
       return false;
     }
   }
  return app('Session');
}

function request($key = false) {
  if(!$key) {
   return app('Request');
  }
  return app('Request')->get($key);
}

function response() {
  return app('Response');
}

function redirect($url, $params = []) {
  return app('Router')->redirect($url, $params);
 }


// Authentication and validation
function auth() {
  return app('Auth');
}

function validate($src, $rules) {
  return app('Validator')->validate($src, $rules);
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


// MISC
function is_assoc_array(array $arr)
{
    if (array() === $arr) return false;
    return array_keys($arr) !== range(0, count($arr) - 1);
}