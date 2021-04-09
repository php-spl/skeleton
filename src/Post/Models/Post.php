<?php

namespace App\Post\Models;

use Web\Database\Model;

class Post extends Model
{
    public function user($id = null)
    {
        if($id) {
            return $this->join('users', 'user')->on('posts.user_id', 'users.id')->where('id', $id)->select()->first();
        } else {
            return $this->join('users', 'user')->on('posts.user_id', 'users.id')->select()->get();
        }
    }
}