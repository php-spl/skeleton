<?php

namespace App\User;

use Web\Database\Model;

class UserModel extends Model
{
    protected $fillable = [
        'id',
        'username',
        'email',
        'password'
    ];
}