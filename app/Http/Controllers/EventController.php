<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function browse(Request $request)
{
    // Retrieve events from the database, optionally apply filters from request
    $query = Event::query();

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    if ($request->filled('date')) {
        // You can implement filtering by date here, e.g.:
        // Filter by 'today', 'weekend', 'month' with date ranges
    }

    $events = $query->get();

    return view('events.browse', compact('events'));
}


    // Show single event
    public function show(Event $event)
    {
        return view('pages.events', compact('event'));
    }

     public function upcoming()
    {
        $events = []; // Replace with Event::where('date', '>', now())->get();

        return view('events.upcoming', compact('events'));
    }

    public function attended()
    {
        $events = []; // Replace with events the user attended

        return view('events.attended', compact('events'));
    }

   public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return response()->json([]);
        }

        $events = Event::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();

        return response()->json($events);
    }

    





}