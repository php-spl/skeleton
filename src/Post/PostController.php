<?php

namespace App\Post;

use Web\Http\Controller;

use App\Service\Middleware\VerifyCSRF;

use App\Post\PostModel as Post;

class PostController extends Controller
{
    public function __construct()
    {
        VerifyCSRF::handle();
    }
    
    public function index() 
    {
        $posts = Post::factory()->select();

        view('posts/index', [
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
            $post = model('Post')->insert([
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
        
        $post = model('Post')->select('posts.*, users.*')
                            ->join('users')
                            ->on('posts.user_id', 'users.id')
                            ->where('posts.id', $id)
                            ->execute();
        view('frontend/posts/show', [
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