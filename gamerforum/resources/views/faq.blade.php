@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
    @foreach($categories as $category)
        <div class="card mb-3">
            <div class="card-header">
                <h3>{{ $category->name }}</h3>
            </div>
            <div class="card-body">
                @foreach($category->faqItems as $faq)
                    <div class="mb-2">
                        <h5>{{ $faq->question }}</h5>
                        <p>{{ $faq->answer }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
