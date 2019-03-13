@extends('layouts.app')

@section('content')
  <table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Creator Name</th>
        <th class="col">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
    </tr>
    @endforeach

  </tbody> 
  </table>   
  
@endsection
