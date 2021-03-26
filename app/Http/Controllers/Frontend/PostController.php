<?php

namespace App\Http\Controllers\Frontend;

use Web\Http\Controller;

use App\Http\Middlewares\VerifyCSRF;

class PostController extends Controller
{

    public function __construct()
    {
        VerifyCSRF::handle();
    }
    
    public function index() 
    {
        $posts = app()->Post->select();

        view('frontend/posts/index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        view('frontend/posts/create');
    }

    public function store()
    {

    }

    public function show($id)
    {
        halt($id);
        $post = db('Post')->select('users.*', 'posts.*')->join('users')->on('posts.user_id', 'users.id')->where('posts.id', $id)->execute();

        //halt($post);

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