@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

        @auth
            @if($cartItems->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-6">
                    @foreach($cartItems as $item)
                        <div class="flex items-center justify-between border-b py-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ $item->event->image_url }}" alt="{{ $item->event->name }}"
                                    class="w-20 h-20 object-cover rounded">
                                <div>
                                    <h3 class="font-semibold">{{ $item->event->name }}</h3>
                                    <p>${{ $item->event->price }} × {{ $item->quantity }}</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <span class="font-bold">${{ $item->event->price * $item->quantity }}</span>
                                <form action="{{ route('cart.remove', $item->event->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-6 flex justify-between items-center">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                                Clear Cart
                            </button>
                        </form>
                        <span class="text-xl font-bold">
                            Total: ${{ $total }}
                        </span>
                    </div>
                    <!-- Checkout Button -->
                    <div class="mt-6 text-right">
                        <a href="{{ route('checkout') }}"
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            @else
                <p class="text-gray-500">Your cart is empty. <a href="{{ route('events.browse') }}"
                        class="text-blue-600 hover:underline">Browse events</a>.</p>
            @endif
        @else
            <p class="text-gray-500">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a> to view your cart.
            </p>
        @endauth
    </div>
@endsection