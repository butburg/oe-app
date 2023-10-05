@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-light ">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:50%" src="/storage/cover_images/{{$post->cover_image}}">
    <br>
    <h3>{{$post->body}}</h3>
    <hr>
    <div class="well">
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id==$post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-success">Edit</a>

            {{ html()->form('POST')->action(route('posts.destroy', $post->id))->class('float-end')->open() }}

            {{ html()->hidden('_method', 'DELETE') }}
            {{ html()->submit('Delete')->class('btn btn-outline-danger') }}

            {{ html()->form()->close() }}
        @endif
    @endif
@endsection
