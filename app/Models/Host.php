<?php

namespace App\Models;

use Web\Database\Model;

class Host extends Model
{
    protected $fillable = [
        'id',
        'name',
        'host',
        'created',
        'last_login'
    ];
}