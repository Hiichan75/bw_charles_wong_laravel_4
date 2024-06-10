@extends('layouts.admin')

@section('title', 'Manage FAQs')

@section('content')
    <a href="{{ url('admin/faq/create') }}" class="btn btn-primary mb-3">Create New FAQ</a>
    @foreach($categories as $category)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <a href="{{ url('admin/faq/edit', $category->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ url('admin/faq', $category->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
