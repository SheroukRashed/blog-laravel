@extends('layouts.app')

@section('content')
<td><a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a></td>
  <table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Creator Name</th>
        <th scope="col">Action</th>  
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
      <td><a href="{{route('posts.edit' , $post)}}" class="btn btn-primary">Edit</a></td>
      <td>
        <form action="{{ route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
      <td>
        <form action="{{ route('posts.show', $post)}}" method="post">
            @csrf
            @method('GET')
            <button class="btn btn-success" type="submit">View</button>
        </form>
      </td>
    </tr>
    @endforeach

  </tbody> 
  </table>   
  
@endsection
