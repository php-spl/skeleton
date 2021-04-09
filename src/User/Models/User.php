<?php

namespace App\User\Models;

use Web\Database\Model;

class User extends Model
{
    protected $fillable = [
        'id',
        'username',
        'email',
        'password'
    ];
}