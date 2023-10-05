@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p><a href="{{route('posts.create')}}" class="btn btn-primary">Create Post</a></p>
                        <h3>Your Posts</h3>

                        @if(count($posts)>0)

                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td><a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                               class="btn btn-outline-primary">Edit</a>
                                        </td>
                                        <td>
                                            {{ html()->form('POST')->action(route('posts.destroy', $post->id))->class('float-end')->open() }}

                                            {{ html()->hidden('_method', 'DELETE') }}
                                            {{ html()->submit('Delete')->class('btn btn-outline-danger') }}

                                            {{ html()->form()->close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no posts. Yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
