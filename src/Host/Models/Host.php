<?php

namespace App\Host\Models;

use Spl\Database\Model;

class Host extends Model
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