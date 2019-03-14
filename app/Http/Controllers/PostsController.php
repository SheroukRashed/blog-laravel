<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\posts\StorePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;

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

    public function store(StorePostRequest $request)
    {
        Post::create($request->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', [
            'post' => $post,
            'users'=> $users,
        ]);
    }

    public function update(UpdatePostRequest $request,$id)
    {

        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
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

    public function show($id)
    {
        return view('posts.show', [
            'post' => Post::find($id)
        ]);
    }
}


