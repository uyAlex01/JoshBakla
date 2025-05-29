@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="bg-[#121212] min-h-screen py-8">
        <div class="container mx-auto px-4">

            <div class="container mx-auto px-4">
                <!-- Add this back link below the opening container div -->
                <a href="{{ route('home') }}" class="inline-block mb-6 text-[#00F6FF] hover:text-[#8F00FF] transition">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Home
                </a>

                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Order Summary -->
                    <div class="lg:w-1/2">
                        <h2 class="text-2xl font-bold text-[#E5E5E5] mb-6 border-b border-[#8F00FF] pb-2">Order Summary</h2>

                        <div class="bg-[#1E1E1E] rounded-lg shadow-lg p-6 mb-6">
                            @foreach($cartItems as $item)
                                <div class="flex items-center justify-between py-4 border-b border-[#2A2A2A]">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ $item->event->image_url }}" class="w-16 h-16 object-cover rounded-lg">
                                        <div>
                                            <h3 class="font-bold text-[#E5E5E5]">{{ $item->event->name }}</h3>
                                            <p class="text-[#A0A0A0] text-sm">${{ $item->event->price }} × {{ $item->quantity }}
                                            </p>
                                        </div>
                                    </div>
                                    <span class="text-[#00F6FF] font-bold">${{ $item->event->price * $item->quantity }}</span>
                                </div>
                            @endforeach

                            <div class="pt-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-[#E5E5E5]">Subtotal</span>
                                    <span class="text-[#E5E5E5]">${{ $total }}</span>
                                </div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-[#E5E5E5]">Service Fee</span>
                                    <span class="text-[#E5E5E5]">$2.50</span>
                                </div>
                                <div class="flex justify-between items-center border-t border-[#8F00FF] pt-3 mt-3">
                                    <span class="text-[#E5E5E5] font-bold">Total</span>
                                    <span class="text-[#00F6FF] text-xl font-bold">${{ $total + 2.50 }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#1E1E1E] rounded-lg shadow-lg p-6">
                            <h3 class="text-lg font-bold text-[#E5E5E5] mb-4">Need Help?</h3>
                            <p class="text-[#A0A0A0] mb-2">
                                <i class="fas fa-phone-alt text-[#8F00FF] mr-2"></i> +1 (555) 123-4567
                            </p>
                            <p class="text-[#A0A0A0]">
                                <i class="fas fa-envelope text-[#8F00FF] mr-2"></i> support@rhythmx.com
                            </p>
                        </div>
                    </div>

                    <!-- Payment Form -->
                    <div class="lg:w-1/2">
                        <h2 class="text-2xl font-bold text-[#E5E5E5] mb-6 border-b border-[#8F00FF] pb-2">Payment Details
                        </h2>

                        <form action="{{ route('checkout.process') }}" method="POST"
                            class="bg-[#1E1E1E] rounded-lg shadow-lg p-6">
                            @csrf

                            <!-- Contact Info -->
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-[#E5E5E5] mb-3">Contact Information</h3>
                                <div class="mb-4">
                                    <label for="email" class="block text-[#A0A0A0] mb-2">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="w-full p-3 rounded-lg bg-[#121212] border border-[#2A2A2A] text-[#E5E5E5] focus:border-[#00F6FF] focus:ring-1 focus:ring-[#00F6FF]"
                                        required>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-[#E5E5E5] mb-3">Payment Method</h3>
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <input type="radio" id="credit" name="payment_method" value="credit"
                                            class="hidden peer" checked>
                                        <label for="credit"
                                            class="block p-3 border border-[#2A2A2A] rounded-lg peer-checked:border-[#8F00FF] peer-checked:bg-[#8F00FF]/10 cursor-pointer">
                                            <div class="flex items-center gap-2 text-[#E5E5E5]">
                                                <i class="fab fa-cc-visa text-2xl"></i>
                                                <span>Credit Card</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" id="paypal" name="payment_method" value="paypal"
                                            class="hidden peer">
                                        <label for="paypal"
                                            class="block p-3 border border-[#2A2A2A] rounded-lg peer-checked:border-[#8F00FF] peer-checked:bg-[#8F00FF]/10 cursor-pointer">
                                            <div class="flex items-center gap-2 text-[#E5E5E5]">
                                                <i class="fab fa-cc-paypal text-2xl"></i>
                                                <span>PayPal</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Credit Card Form (shown by default) -->
                                <div id="credit-card-form">
                                    <div class="mb-4">
                                        <label for="card_name" class="block text-[#A0A0A0] mb-2">Name on Card</label>
                                        <input type="text" id="card_name" name="card_name"
                                            class="w-full p-3 rounded-lg bg-[#121212] border border-[#2A2A2A] text-[#E5E5E5] focus:border-[#00F6FF]">
                                    </div>
                                    <div class="mb-4">
                                        <label for="card_number" class="block text-[#A0A0A0] mb-2">Card Number</label>
                                        <input type="text" id="card_number" name="card_number"
                                            class="w-full p-3 rounded-lg bg-[#121212] border border-[#2A2A2A] text-[#E5E5E5] focus:border-[#00F6FF]">
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="expiry" class="block text-[#A0A0A0] mb-2">Expiration</label>
                                            <input type="text" id="expiry" name="expiry" placeholder="MM/YY"
                                                class="w-full p-3 rounded-lg bg-[#121212] border border-[#2A2A2A] text-[#E5E5E5] focus:border-[#00F6FF]">
                                        </div>
                                        <div>
                                            <label for="cvc" class="block text-[#A0A0A0] mb-2">CVC</label>
                                            <input type="text" id="cvc" name="cvc"
                                                class="w-full p-3 rounded-lg bg-[#121212] border border-[#2A2A2A] text-[#E5E5E5] focus:border-[#00F6FF]">
                                        </div>
                                    </div>
                                </div>

                                <!-- PayPal Form (hidden by default) -->
                                <div id="paypal-form" class="hidden mt-4">
                                    <div class="bg-[#121212] p-4 rounded-lg border border-[#2A2A2A]">
                                        <p class="text-[#A0A0A0] mb-2">You'll be redirected to PayPal to complete your
                                            purchase
                                        </p>
                                        <div class="h-10 bg-[#253B80] rounded flex items-center justify-center">
                                            <i class="fab fa-cc-paypal text-2xl text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Complete Order Button -->
                            <button type="submit"
                                class="w-full py-4 bg-[#8F00FF] hover:bg-[#7A00D9] text-white font-bold rounded-lg transition duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-lock"></i> Complete Order for ${{ number_format($total + 2.50, 2) }}
                            </button>

                            <p class="text-[#A0A0A0] text-sm mt-4">
                                <i class="fas fa-lock text-[#00F6FF] mr-1"></i> Your payment is secured with 256-bit
                                encryption
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript to toggle payment forms -->
        <script>
            document.querySelectorAll('input[name="payment_method"]').forEach(el => {
                el.addEventListener('change', (e) => {
                    document.getElementById('credit-card-form').classList.toggle('hidden', e.target.value !== 'credit');
                    document.getElementById('paypal-form').classList.toggle('hidden', e.target.value !== 'paypal');
                });
            });
        </script>
@endsection