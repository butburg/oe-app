@extends('layouts.app')

@section('content')
    <h1>Edit</h1>

    {{ html()->form('POST')->action(route('posts.update', $post->id))->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="form-group">
        {{ html()->label('titleName','title') }}
        {{ html()->text('title', $post->title)->class('mb-2 form-control')->placeholder('Title') }}
    </div>
    <div class="form-group">
        {{ html()->label('Contentbody','body') }}
        {{ html()->textarea('body', $post->body)->class('mb-2 form-control') }}
    </div>
    {{ html()->hidden('_method', 'PUT') }}

    <div class="form-group">
        {{html()->file('cover_image')->class('mb-2 form-control')}}
    </div>


    {{ html()->submit('Go')->class('btn btn-primary') }}

    {{ html()->form()->close() }}
@endsection
