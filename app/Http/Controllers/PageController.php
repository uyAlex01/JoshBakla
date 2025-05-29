<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function browse()
    {
        return view('pages.browse');
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function organize()
    {
        return view('pages.organize');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }

    public function ticketing()
    {
        return view('pages.event-ticketing');
    }
}
