<!-- resources/views/pages/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Main Content Wrapper -->
    <main class="flex-grow flex flex-col justify-center items-center px-4 py-10 text-center max-w-3xl mx-auto mt-12 mb-12">
        <h1
            class="text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-cyan-400 to-purple-600 mb-2">
            Find Your Perfect
            <span class="text-cyan-400">
                Event
            </span>
        </h1>
        <p class="text-gray-300 text-sm sm:text-base mb-8">
            Discover and book tickets to the hottest concerts and music events near you.
        </p>
        <form
            class="bg-gradient-to-r from-purple-900/70 via-cyan-900/70 to-cyan-900/70 rounded-lg shadow-lg w-full max-w-3xl p-6 grid grid-cols-1 sm:grid-cols-3 gap-6"
            onsubmit="searchEvents(event)">
            <div class="flex flex-col">
                <label class="text-xs font-semibold text-cyan-400 mb-1" for="searchInput">
                    What are you looking for?
                </label>
                <input aria-label="Search for artist, event, or venue"
                    class="border border-purple-600 rounded-md px-3 py-2 text-sm placeholder-gray-400 bg-black bg-opacity-30 text-white focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400"
                    id="searchInput" placeholder="Artist, event, or venue" type="text" />
            </div>
            <div class="flex flex-col">
                <label class="text-xs font-semibold text-cyan-400 mb-1" for="locationInput">
                    Where?
                </label>
                <input aria-label="Search by city or zip code"
                    class="border border-purple-600 rounded-md px-3 py-2 text-sm placeholder-gray-400 bg-black bg-opacity-30 text-white focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400"
                    id="locationInput" placeholder="City or zip code" type="text" />
            </div>
            <div class="flex flex-col">
                <label class="text-xs font-semibold text-cyan-400 mb-1" for="dateInput">
                    When?
                </label>
                <div class="relative">
                    <input aria-label="Select date"
                        class="border border-purple-600 rounded-md px-3 py-2 text-sm placeholder-gray-400 bg-black bg-opacity-30 text-white w-full pr-10 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400"
                        id="dateInput" placeholder="dd/mm/yyyy" type="date" />
                    <span class="absolute inset-y-0 right-3 flex items-center text-cyan-400 pointer-events-none">
                        <i class="far fa-calendar-alt">
                        </i>
                    </span>
                </div>
            </div>
            <button
                class="sm:col-span-3 mt-4 sm:mt-0 bg-gradient-to-r from-purple-600 to-cyan-500 hover:from-purple-700 hover:to-cyan-600 text-white font-semibold text-sm rounded-md flex items-center justify-center gap-2 px-6 py-3 transition-transform transform hover:scale-105"
                type="submit">
                <i class="fas fa-search">
                </i>
                Search Events
            </button>
        </form>
    </main>

@endsection