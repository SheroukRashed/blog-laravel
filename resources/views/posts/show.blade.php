@extends('layouts.app')

@section('content')
<a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Created At</th>
        <th scope="col">Description</th>
        <th scope="col">Creator Name</th>        
        </tr>
    </thead>
    <tbody>
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->created_at->format('d-m-Y H:i:s')}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
    </tr>
    </tbody>


@endsection