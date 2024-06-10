@extends('layouts.app')

@section('title', 'Forum Threads')

@section('content')
    <a href="{{ url('threads/create') }}" class="btn btn-primary mb-3">Create New Thread</a>
    @foreach($threads as $thread)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ url('threads', $thread->id) }}">{{ $thread->title }}</a></h5>
                <p class="card-text">{{ Str::limit($thread->content, 100) }}</p>
                <a href="{{ url('threads', $thread->id) }}" class="btn btn-primary">View Thread</a>
            </div>
        </div>
    @endforeach
@endsection