<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
{
    $eventId = $request->input('event_id');

    if (!$eventId) {
        return response()->json(['success' => false, 'message' => 'No event ID provided'], 400);
    }

    // Example: Add the event to cart, assuming you have Cart model and user logged in
    try {
        Cart::create([
            'user_id' => auth()->id(),
            'event_id' => $eventId,
            'quantity' => 1,
        ]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to add to cart'], 500);
    }

    return response()->json(['success' => true]);
}


    public function viewCart()
    {
        $userId = Auth::id();
        $cartItems = Cart::with('event')->where('user_id', $userId)->get();

        return view('cart.view', compact('cartItems'));
    }
}
