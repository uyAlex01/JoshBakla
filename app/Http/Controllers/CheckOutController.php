<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->carts()->with('event')->get();
        $total = $cartItems->sum(fn($item) => $item->event->price * $item->quantity);
        
        return view('pages.checkout', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        // Validate and process payment
        $validated = $request->validate([
            'payment_method' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            // Add other validation rules
        ]);

        // Process payment logic here
        // Redirect to success page or back with errors
    }


    public function success()
    {
        return view('pages.checkout_success');
    }

    public function cancel()
    {
        return redirect()->route('cart.view')->with('error', 'Checkout cancelled.');
    }
}