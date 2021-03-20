<?php

namespace App\Models;

use Web\Database\Model;

class User extends Model
{
protected $prefix = 'wp.';

  protected $fields = [
      'username',
      'password'
  ];
    
}