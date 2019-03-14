@extends('layouts.app')

@section('content')
<a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Creator Name</th>        
        </tr>
    </thead>
    <tbody>
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
    </tr>
    </tbody>


@endsection