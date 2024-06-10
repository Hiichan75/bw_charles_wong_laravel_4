@extends('layouts.admin')

@section('title', 'Manage News')

@section('content')
    <a href="{{ url('admin/news/create') }}" class="btn btn-primary mb-3">Create New News</a>
    @foreach($news as $newsItem)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $newsItem->title }}</h5>
                <a href="{{ url('admin/news/edit', $newsItem->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ url('admin/news', $newsItem->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
