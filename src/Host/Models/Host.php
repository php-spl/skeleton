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

    public function getHost($host)
    {
        if($host) {
            return $this->select()->where('host', $host)->first();
        }
        return false;
    }
}