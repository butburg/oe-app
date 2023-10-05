@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                @include('profile.partials.update-profile-information-form')
            </div>
            <div class="col-lg-6 mb-4">
                @include('profile.partials.update-password-form')
            </div>
            <div class="col-lg-6 mb-4">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
