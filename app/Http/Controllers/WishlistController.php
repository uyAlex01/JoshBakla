<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    
    public function index()
{
    $user = Auth::user();

    $wishlists = Wishlist::with('event')
        ->where('user_id', $user->id)
        ->get();

    return view('wishlist.index', compact('wishlists'));
}

    
}