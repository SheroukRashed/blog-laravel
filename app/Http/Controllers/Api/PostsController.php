<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\posts\StorePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return PostResource::collection($posts);
    }

    public function show(Post $post) 
    {
        return new PostResource($post);
    }

    // public function show($post)
    // {
    //     $post = Post::findOrFail($post); 
    //     return new PostResource($post);
    // }

    public function store(StorePostRequest $request)    //... f postman 7an3ml accept json fe al header(bta3 al request) 3shan 2a2ol myrodsh 3alya bl home(aw web) yrood 3alya b json
    {
        Post::create($request->all());

        return response() -> json([
            'massege' => 'Post Was Created Successfully'
        ]);
    }
}
