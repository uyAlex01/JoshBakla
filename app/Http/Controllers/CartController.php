<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Add an event to the user's cart.
     */
    public function addToCart(Request $request)
{
    $validated = $request->validate([
        'event_id' => 'required|exists:events,id',
        'quantity' => 'required|integer|min:1|max:10' // Example validation
    ]);

    // Check ticket availability
    $event = Event::find($request->event_id);
    if ($event->available_tickets < $request->quantity) {
        return back()->with('error', 'Not enough tickets available!');
    }

    // Add to cart logic
    Cart::add($event, $request->quantity);}
    
  

    /**
     * Show the cart page with all items.
     */
    public function viewCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }

        $cartItems = Auth::user()->carts()->with('event')->get();

        $total = $cartItems->sum(function ($item) {
            return $item->event->price * $item->quantity;
        });

        return view('pages.cart', compact('cartItems', 'total'));
    }

    /**
     * Remove a single event from the cart.
     */
    public function removeFromCart($eventId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        Auth::user()->carts()->where('event_id', $eventId)->delete();

        return redirect()->back()->with('success', 'Event removed from cart!');
    }

    /**
     * Clear the user's entire cart.
     */
    public function clearCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        Auth::user()->carts()->delete();

        return redirect()->back()->with('success', 'Cart cleared!');
    }
}
