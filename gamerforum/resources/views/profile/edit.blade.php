@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->profile->birthday }}">
        </div>
        <div class="form-group">
            <label for="bio">About Me</label>
            <textarea class="form-control" id="bio" name="bio">{{ $user->profile->bio }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
@endsection
