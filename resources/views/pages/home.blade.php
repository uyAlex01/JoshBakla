<!-- resources/views/pages/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="hero-section bg-primary text-white py-5 mb-5">
        <div class="container text-center">
            <h1 class="display-4">Welcome to RHYTMX</h1>
            <p class="lead">Feel the Beat. Book Your Seat.</p>
            <a href="{{ route('events.browse') }}" class="btn btn-light btn-lg">Browse Events</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Find Events</h5>
                        <p class="card-text">Discover exciting events happening near you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Organize</h5>
                        <p class="card-text">Create and manage your own events with ease.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Sell Tickets</h5>
                        <p class="card-text">Monetize your events with our ticketing system.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection