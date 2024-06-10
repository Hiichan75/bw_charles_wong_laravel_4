@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row">
        @foreach($news as $newsItem)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $newsItem->cover_image) }}" class="card-img-top" alt="{{ $newsItem->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $newsItem->title }}</h5>
                        <p class="card-text">{{ Str::limit($newsItem->content, 100) }}</p>
                        <a href="{{ url('news', $newsItem->id) }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
