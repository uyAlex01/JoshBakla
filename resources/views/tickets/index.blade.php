@extends('layouts.app')

@section('content')
<div class="container py-5" style="min-height: 80vh; background-color: #121212; color: #E5E5E5;">
  <h1 class="mb-4" style="color: #8F00FF; font-weight: bold;">My Tickets</h1>

  @if($tickets->isEmpty())
    <p style="color: #FF4F81;">You have no tickets yet. Browse events and get yours!</p>
  @else
    <div class="row g-4">
      @foreach($tickets as $ticket)
        <div class="col-md-6 col-lg-4">
          <div class="card h-100" 
            style="background-color: #121212; border: 2px solid #8F00FF; box-shadow: 0 0 10px #00F6FF;">
            <div class="card-body">
              <h5 class="card-title" style="color: #00F6FF;">{{ $ticket->event->name }}</h5>
              <p class="card-text" style="color: #E5E5E5;">
                <strong>Date:</strong> {{ $ticket->event->date->format('F j, Y') }}<br>
                <strong>Venue:</strong> {{ $ticket->event->venue }}<br>
                <strong>Seat:</strong> {{ $ticket->seat ?? 'General Admission' }}
              </p>
            </div>
            <div class="card-footer text-end" style="background-color: #121212; border-top: 1px solid #8F00FF;">
              <a href="{{ route('events.show', $ticket->event->id) }}" 
                 class="btn btn-sm" 
                 style="background-color: #8F00FF; color: #121212; font-weight: 600;">
                View Event
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection
