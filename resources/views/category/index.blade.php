@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4" style="color: #00F6FF;">All Categories</h1>

        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: rgba(15, 15, 15, 0.9);">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #8F00FF;">
                                <i class="bi {{ $category->icon }}"></i> {{ $category->name }}
                            </h5>
                            <a href="{{ route('category.show', $category->slug) }}" class="btn btn-primary"
                                style="background-color: #8F00FF; border: none;">
                                View Events
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection