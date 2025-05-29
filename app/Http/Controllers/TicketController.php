<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        // Example: retrieve all tickets (replace with your model)
        $tickets = []; // Dummy data or use Ticket::all();

        return view('tickets.index', compact('tickets'));
    }

    public function show($id)
    {
        // Example: retrieve single ticket by id
        $ticket = null; // Replace with Ticket::findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }
}

