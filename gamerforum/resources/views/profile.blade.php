@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $user->profile->avatar }}" alt="Avatar" class="img-thumbnail">
        </div>
        <div class="col-md-8">
            <h2>{{ $user->name }}</h2>
            <p><strong>Birthday:</strong> {{ $user->profile->birthday }}</p>
            <p><strong>About me:</strong> {{ $user->profile->bio }}</p>
            @if(Auth::id() == $user->id)
                <a href="{{ url('profile/edit') }}" class="btn btn-primary">Edit Profile</a>
            @endif
        </div>
    </div>
@endsection
