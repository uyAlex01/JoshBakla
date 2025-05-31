@extends('layouts.app')

@push('styles')
    <style>
        /* Color variables - scoped to this page only */
        :root {
            --electric-violet: #8F00FF;
            --neon-aqua: #00F6FF;
            --platinum-gray: #E5E5E5;
            --jet-black: #121212;
            --jet-black-light: #1E1E1E;
            --sunset-coral: #FF4F81;
            --dashboard-bg-dark: #121212;
            /* Add this line */
        }

        body {
            background: var(--dashboard-bg-dark);
            color: var(--platinum-gray);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Main content container */
        .browse-page {
            background: var(--dashboard-bg-dark);
            /* Changed from transparent to match dashboard */
            color: var(--platinum-gray);
            padding: 5rem 0;
            min-height: 100vh;
        }

        /* Typography */
        .browse-highlight {
            color: var(--electric-violet);
        }

        .browse-subtext {
            color: rgba(229, 229, 229, 0.8);
        }

        /* Stats grid */
        .browse-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .browse-stat-card {
            background: var(--jet-black-light);
            border: 1px solid #333;
            padding: 1rem;
            border-radius: 1rem;
        }

        /* Events grid */
        .browse-events-container {
            background: var(--jet-black-light);
            padding: 1.5rem;
            border-radius: 1rem;
            border: 1px solid #333;
        }

        .browse-events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .browse-event-card {
            border: 1px solid #333;
            border-radius: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            background: var(--jet-black);
        }

        .browse-event-card:hover {
            border-color: var(--neon-aqua);
            transform: translateY(-5px);
        }

        .browse-event-img-container {
            height: 12rem;
            overflow: hidden;
            position: relative;
        }

        .browse-event-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .browse-event-card:hover .browse-event-img {
            transform: scale(1.05);
        }

        .browse-event-tag {
            position: absolute;
            bottom: 0.5rem;
            left: 0.5rem;
            background: var(--electric-violet);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }

        .browse-event-content {
            padding: 1rem;
        }

        .browse-event-title {
            font-weight: bold;
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }

        .browse-event-card:hover .browse-event-title {
            color: var(--neon-aqua);
        }

        .browse-event-meta {
            color: #999;
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
        }

        .browse-event-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .browse-event-price {
            color: var(--neon-aqua);
            font-weight: bold;
        }

        .browse-event-button {
            background: var(--electric-violet);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: background 0.3s;
        }

        .browse-event-button:hover {
            background: #7A00D9;
        }

        .browse-search-section {
            background: var(--jet-black-light);
            padding: 1.5rem;
            border-radius: 1rem;
            border: 1px solid #333;
            margin-bottom: 2rem;
        }

        .browse-search-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .browse-search-container {
                flex-direction: row;
            }
        }

        .browse-search-input {
            flex-grow: 1;
            padding: 0.75rem 1rem;
            background: var(--jet-black);
            border: 2px solid #333;
            border-radius: 0.5rem;
            color: var(--platinum-gray);
            transition: border 0.3s;
        }

        .browse-search-input:hover {
            border-color: var(--electric-violet);
        }

        .browse-search-input:focus {
            outline: none;
            border-color: var(--neon-aqua);
        }

        .browse-filter-select {
            padding: 0.75rem 1rem;
            background: var(--jet-black);
            border: 2px solid #333;
            border-radius: 0.5rem;
            color: var(--platinum-gray);
            transition: border 0.3s;
        }

        .browse-header {
            text-align: center;
            margin-bottom: 2rem;
            padding: 0 1rem;
        }
    </style>
@endpush

@section('content')
<div class="browse-page">
    <div class="container mx-auto px-4">
        <!-- Search and Filter Section -->
        <form id="searchForm" class="browse-search-section" method="GET" action="{{ route('events.browse') }}">
            @csrf
            <div class="browse-search-container">
                <input type="text" name="search" placeholder="Search events..." class="browse-search-input"
                    value="{{ request('search') }}">
                <select name="category" class="browse-filter-select">
                    <option value="">All Categories</option>
                    <option value="concerts" {{ request('category') == 'concerts' ? 'selected' : '' }}>Concerts</option>
                    <option value="music_festivals" {{ request('category') == 'music_festivals' ? 'selected' : '' }}>Music Festivals</option>
                    <option value="battle_of_the_bands" {{ request('category') == 'battle_of_the_bands' ? 'selected' : '' }}>Battle of the Bands</option>
                    <option value="album_release_parties" {{ request('category') == 'album_release_parties' ? 'selected' : '' }}>Album Release Parties</option>
                    <option value="dj_sets_club_nights" {{ request('category') == 'dj_sets_club_nights' ? 'selected' : '' }}>DJ Sets / Club Nights</option>
                    <option value="orchestral_performances" {{ request('category') == 'orchestral_performances' ? 'selected' : '' }}>Orchestral Performances</option>
                    <option value="opera_shows" {{ request('category') == 'opera_shows' ? 'selected' : '' }}>Opera Shows</option>
                    <option value="tribute_shows" {{ request('category') == 'tribute_shows' ? 'selected' : '' }}>Tribute Shows</option>
                    <option value="record_store_events" {{ request('category') == 'record_store_events' ? 'selected' : '' }}>Record Store Events</option>
                    <option value="music_award_ceremonies" {{ request('category') == 'music_award_ceremonies' ? 'selected' : '' }}>Music Award Ceremonies</option>
                </select>
                <select name="date" class="browse-filter-select">
                    <option value="">Any Date</option>
                    <option value="today" {{ request('date') == 'today' ? 'selected' : '' }}>Today</option>
                    <option value="weekend" {{ request('date') == 'weekend' ? 'selected' : '' }}>This Weekend</option>
                    <option value="month" {{ request('date') == 'month' ? 'selected' : '' }}>This Month</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-[#8F00FF] hover:bg-[#7A00D9] rounded-lg text-white font-medium">
                    Search
                </button>
            </div>
        </form>

        <!-- Header -->
        <header class="browse-header">
            <h1 class="text-2xl md:text-3xl font-bold">Discover <span class="browse-highlight">Electric Experiences</span></h1>
            <p class="browse-subtext mt-2">Find the hottest music events in Asia for 2025</p>
        </header>

        <!-- Stats Cards -->
        <div class="browse-stats">
            <div class="browse-stat-card">
                <p class="text-sm text-[#999]">Events Found</p>
                <p class="text-xl font-bold">6</p>
            </div>
            <div class="browse-stat-card">
                <p class="text-sm text-[#999]">Countries Covered</p>
                <p class="text-xl font-bold">6</p>
            </div>
            <div class="browse-stat-card">
                <p class="text-sm text-[#999]">Price Range</p>
                <p class="text-xl font-bold">₱1,800 – ₱23,800</p>
            </div>
            <div class="browse-stat-card">
                <p class="text-sm text-[#999]">New This Year</p>
                <p class="text-xl font-bold">6</p>
            </div>
        </div>

        <!-- Events Data -->
        @php
            $events = [
                [
                    'title' => 'One Love Asia 2025',
                    'dates' => 'October 4-5, 2025',
                    'venue' => 'The Meadows, Gardens by the Bay, Singapore',
                    'category' => 'Festival',
                    'price_php' => '₱8,100 - ₱23,800',
                    'details' => 'A celebration of Asian culture, unity, and diversity featuring artists like Eric Zhou, Benjamin Kheng, and JJ Lin.',
                    'link' => '#',
                    'image' => asset('images/images.jpg'),
                ],
                [
                    'title' => 'Shillong Cherry Blossom Festival',
                    'dates' => 'November 2025 (Exact dates TBA)',
                    'venue' => 'Shillong, Meghalaya, India',
                    'category' => 'Festival',
                    'price_php' => 'Free / Varies',
                    'details' => 'Annual cultural event with performances by Akon, R3HAB, and Ne-Yo during cherry blossom season.',
                    'link' => '#',
                    'image' => 'https://blogs.tripzygo.in/wp-content/uploads/2024/10/cherry-blossom-festival-in-shillong.jpg',
                ],
                [
                    'title' => 'Rolling Loud Thailand 2025',
                    'dates' => 'November 14-16, 2025',
                    'venue' => 'TBA, Thailand',
                    'category' => 'Hip-Hop Festival',
                    'price_php' => '₱10,000',
                    'details' => 'Renowned hip-hop festival featuring international and regional artists.',
                    'link' => '#',
                    'image' => 'https://www.thailandsun.com/upload/news/rolling-loud-festival-kommt-nach-pattaya-Bild-1.jpg',
                ],
                [
                    'title' => 'Round Festival 2025',
                    'dates' => 'June 21-22, 2025',
                    'venue' => 'Zepp Kuala Lumpur, Malaysia',
                    'category' => 'Music Festival',
                    'price_php' => '₱1,800',
                    'details' => 'Promoting cultural exchanges between Korea and ASEAN countries through popular music.',
                    'link' => '#',
                    'image' => 'https://magazineclonerepub.azureedge.net/mcepub/933/271459/image/bd7c8ca3-4cf9-45d1-a345-2dd8a2fde92e.jpg',
                ],
                [
                    'title' => 'Equation Festival 2025',
                    'dates' => 'April 4-6, 2025',
                    'venue' => 'Mo Luong Cave, Mai Chau, Vietnam',
                    'category' => 'Electronic Music',
                    'price_php' => 'Free / Varies',
                    'details' => 'Immersive electronic music experience set in a stunning cave environment.',
                    'link' => '#',
                    'image' => 'https://imgproxy.ra.co/_/rt:fill/h:630/w:1200/quality:50/aHR0cHM6Ly9pbWFnZXMucmEuY28vNDAxY2UzMDI3YTgxZTYxNWI0YzQ4NWQwNzlmMjJmOWFjODY2M2QxYy5wbmc=',
                ],
                [
                    'title' => 'Nano-Mugen Festival 2025',
                    'dates' => 'May 24-25 (Jakarta) & May 31-June 1 (Yokohama)',
                    'venue' => 'Ecopark Ancol, Jakarta & K-Arena Yokohama, Japan',
                    'category' => 'Rock Festival',
                    'price_php' => '₱3,400',
                    'details' => 'Revival of the iconic festival featuring international and local rock acts.',
                    'link' => '#',
                    'image' => 'https://th.bing.com/th/id/OIP.ikR2gvnqSEdcDmAqksEA0wHaHZ?rs=1&pid=ImgDetMain',
                ],
            ];
        @endphp

        <!-- Events Grid -->
        <div class="browse-events-container">
            <h2 class="text-xl font-semibold mb-4">Upcoming Music Events in Asia</h2>

            <div class="browse-events-grid">
                @foreach ($events as $index => $event)
                    <!-- Event Card -->
                    <div class="browse-event-card">
                        <div class="browse-event-img-container">
                            @if ($event['image'])
                                <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="browse-event-img">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-800 text-gray-500">
                                    <span>No Image Available</span>
                                </div>
                            @endif
                            <span class="browse-event-tag">{{ $event['category'] }}</span>
                        </div>
                        <div class="browse-event-content">
                            <h3 class="browse-event-title">{{ $event['title'] }}</h3>
                            <p class="browse-event-meta">{{ $event['dates'] }}</p>
                            <p class="text-sm mb-3">{{ $event['details'] }}</p>
                            <p class="text-sm text-gray-400"><strong>Venue:</strong> {{ $event['venue'] }}</p>
                            <div class="browse-event-footer">
                                <span class="browse-event-price">{{ $event['price_php'] }}</span>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal{{ $index }}">More Info</button>
                                <form action="{{ route('cart.add') }}" method="POST" style="display:inline-block; margin-left: 10px;">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event['id'] ?? $index }}">
                                    <button type="submit" class="btn btn-success">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="eventModal{{ $index }}" tabindex="-1" aria-labelledby="eventModalLabel{{ $index }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $event['title'] }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ $event['image'] }}" class="img-fluid mb-3">
                                    <p><strong>Dates:</strong> {{ $event['dates'] }}</p>
                                    <p><strong>Venue:</strong> {{ $event['venue'] }}</p>
                                    <p><strong>Category:</strong> {{ $event['category'] }}</p>
                                    <p><strong>Price:</strong> {{ $event['price_php'] }}</p>
                                    <p><strong>Details:</strong> {{ $event['details'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Browse page loaded');
        });
    </script>
@endpush
