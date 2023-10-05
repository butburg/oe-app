@extends('layouts.app')

@section('content')
<! -- info: take the name from .env or the default OEAPP-->
<h1>{{$title}}</h1>
<p>My first app called {{config('app.name', 'OEAPP')}}.</p>
@endsection
