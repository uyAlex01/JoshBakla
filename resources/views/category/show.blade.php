@extends('layouts.app')

@section('title', $category->name . ' Events')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4" style="color: #00F6FF;">
            <i class="bi {{ $category->icon }} me-2"></i>
            {{ $category->name }} Events
        </h1>

        <div class="row">
            @foreach($events as $event)
                <!-- Your event card display here -->
            @endforeach
        </div>

        {{ $events->links() }}
    </div>
@endsection