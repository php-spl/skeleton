<?php

namespace App\Post\Http\Controllers;

use Web\Http\Controller;

use App\Provider\Http\Middleware\VerifyCSRF as CSRF;

use App\Post\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        CSRF::handle();
    }
    
    public function index() 
    {
        $posts = Post::factory()->select();

        view('posts/index', [
            'title' => 'Articles',
            'posts' => $posts
        ]);
    }

    public function create()
    {
        view('posts/create');
    }

    public function store()
    {
        $v = validate($_POST, [
            'title' => [
                'required' => true
            ],
            'body' => [
                'required' => true
            ]
        ]);

        if(!$v->fails()) {
            $post = Post::factory()->insert([
                'title' => request()->get('title'),
                'user_id' => 2,
                'body' => request()->get('body')
            ])->save();

            halt($post);
            exit();

            if($post) {
                session()->set('success', 'Post created');
                return redirect($this->url['create']);
            }
        } else {
            session()->set('errors', $v->errors()->get());
            return redirect($this->url['create']);
        }
    }

    public function show($id)
    {

        $post = Post::factory()->select()
                            ->join('users')
                            ->on('posts.user_id', 'users.id')
                            ->where('posts.id', $id)
                            ->toString();

        halt($post);

        view('posts/show', [
            'tite' => $post->title,
            'post' => $post
        ]);
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }

    public function delete()
    {
        
    }


}