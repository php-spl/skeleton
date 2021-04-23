<?php

namespace App\User\Models;

use Spl\Database\Model;

class User extends Model
{
    protected $fillable = [
        'id',
        'username',
        'email',
        'password'
    ];
}