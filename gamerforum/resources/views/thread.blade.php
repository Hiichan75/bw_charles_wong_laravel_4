@extends('layouts.app')

@section('title', 'Thread Details')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $thread->title }}</h5>
            <p class="card-text">{{ $thread->content }}</p>
        </div>
    </div>

    @foreach($thread->replies as $reply)
        <div class="card mb-3">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">{{ $reply->user->name }}</h6>
                <p class="card-text">{{ $reply->content }}</p>
            </div>
        </div>
    @endforeach

    @auth
        <form action="{{ url('threads', $thread->id) }}/reply" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Reply</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Reply</button>
        </form>
    @endauth
@endsection