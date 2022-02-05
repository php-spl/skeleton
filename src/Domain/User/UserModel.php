<?php

namespace App\User\Models;

use Spl\Database\Model;

class UserModel extends Model
{
    protected $fillable = [
        'id',
        'username',
        'email',
        'password'
    ];
}