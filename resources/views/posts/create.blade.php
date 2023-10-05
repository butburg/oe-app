@extends('layouts.app')

@section('content')
    <h1>Create</h1>

    {{ html()->form('POST')->action(route('posts.index'))->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="form-group">
        {{ html()->label('titleName','title') }}
        {{ html()->text('title')->class('mb-2 form-control')->placeholder('Title') }}
    </div>
    <div class="form-group">
        {{ html()->label('Contentbody','body') }}
        {{ html()->textarea('body', 'valuess')->class('mb-2 form-control') }}
    </div>

    <div class="form-group">
        {{html()->file('cover_image')->class('mb-2 form-control')}}
    </div>


    {{ html()->submit('Go')->class('btn btn-success') }}

    {{ html()->form()->close() }}
@endsection
