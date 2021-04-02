<?php

namespace App\Host;

use Web\Database\Model;

class HostModel extends Model
{
    protected $fillable = [
        'id',
        'name',
        'host',
        'created',
        'last_login'
    ];
}