@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <h3 class="text-white">Search results for "{{ $query }}"</h3>

    @if ($events->isEmpty())
      <p class="text-white">No events found.</p>
    @else
      <div class="row">
        @foreach ($events as $event)
          <div class="col-md-4 mb-3">
            <div class="card" style="background-color: #1a1a1a; color: white;">
              <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-info">View Event</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
@endsection
