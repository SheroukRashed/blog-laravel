<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store()
    {
        Post::create(request()->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
       
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($id)
    {

        $post = Post::find($id);
        $post->title = request()->get('title');
        $post->description = request()->get('description');
        $post->user_id = $post->user_id;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id)
{
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post has been deleted Successfully');
}
}


