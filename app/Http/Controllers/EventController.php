<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Show browse page with filters
    public function browse(Request $request)
    {
        $query = Event::query()->with('category');

        // Search
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Sorting
        switch ($request->sort) {
            case 'price_low':
                $query->orderBy('price');
                break;
            case 'price_high':
                $query->orderByDesc('price');
                break;
            default:
                $query->latest();
        }

        $events = $query->paginate(12);
        $categories = Category::all();

        return view('pages.browse', compact('events', 'categories'));
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
}