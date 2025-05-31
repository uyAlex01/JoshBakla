<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
{
    $user = auth()->user();

    $tickets = $user->tickets()->with('event')->get();

    return view('tickets.index', compact('tickets'));
}

    public function show($id)
    {
        // Example: retrieve single ticket by id
        $ticket = null; // Replace with Ticket::findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }
    
}

