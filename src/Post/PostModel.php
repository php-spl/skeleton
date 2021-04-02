<?php

namespace App\Post;

use Web\Database\Model;

class PostModel extends Model
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