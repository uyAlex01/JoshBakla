@extends('layouts.app')

@section('title', 'Order Confirmed - Rhythmx')

@section('content')
    <div class="bg-[#121212] min-h-screen py-8">
        <div class="container mx-auto px-4">
            <!-- Back Navigation -->
            <div class="mb-8">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center text-[#00F6FF] hover:text-[#8F00FF] transition group">
                    <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                    Back to Home
                </a>
            </div>

            <!-- Success Card -->
            <div
                class="max-w-2xl mx-auto bg-gradient-to-br from-[#1E1E1E] to-[#121212] rounded-xl shadow-2xl overflow-hidden border border-[#8F00FF]/30">
                <!-- Glowing Header -->
                <div class="bg-[#8F00FF]/10 p-6 border-b border-[#8F00FF]/20 relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-[#8F00FF] rounded-full filter blur-3xl opacity-10">
                    </div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-20 h-20 bg-[#8F00FF] rounded-full flex items-center justify-center mb-4 shadow-lg">
                            <i class="fas fa-check text-white text-3xl"></i>
                        </div>
                        <h1 class="text-3xl font-bold text-[#E5E5E5] text-center">Order Confirmed!</h1>
                        <p class="text-[#A0A0A0] mt-2 text-center">Your tickets are secured</p>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8 sm:p-10">
                    <div class="flex justify-center mb-6">
                        <div class="animate-bounce" style="animation-duration: 2s;">
                            <i class="fas fa-ticket-alt text-4xl text-[#00F6FF]"></i>
                        </div>
                    </div>

                    <div class="text-center mb-8">
                        <p class="text-[#E5E5E5] mb-4">
                            We've sent your tickets to <span class="text-[#00F6FF]">email@example.com</span>
                        </p>
                        <p class="text-[#A0A0A0] text-sm">
                            Can't find them? Check your spam folder or
                            <a href="#" class="text-[#8F00FF] hover:underline">resend confirmation</a>
                        </p>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-[#121212] rounded-lg p-6 mb-8 border border-[#2A2A2A]">
                        <h3 class="font-bold text-[#E5E5E5] mb-4 flex items-center">
                            <i class="fas fa-receipt text-[#8F00FF] mr-2"></i>
                            Order Summary
                        </h3>
                        <div class="space-y-3">
                            @foreach($order->items as $item)
                                <div class="flex justify-between">
                                    <span class="text-[#A0A0A0]">{{ $item->event->name }}</span>
                                    <span class="text-[#E5E5E5]">${{ $item->price }}</span>
                                </div>
                            @endforeach
                            <div class="border-t border-[#2A2A2A] pt-2 mt-2">
                                <div class="flex justify-between font-bold">
                                    <span class="text-[#E5E5E5]">Total</span>
                                    <span class="text-[#00F6FF]">${{ $order->total }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('events.browse') }}"
                            class="px-6 py-3 bg-[#00F6FF] hover:bg-[#00D9E5] text-[#121212] font-bold rounded-lg transition flex items-center justify-center gap-2">
                            <i class="fas fa-music"></i> Find More Events
                        </a>
                        <a href="{{ route('dashboard') }}"
                            class="px-6 py-3 border border-[#8F00FF] text-[#E5E5E5] hover:bg-[#8F00FF]/10 rounded-lg transition flex items-center justify-center gap-2">
                            <i class="fas fa-ticket-alt"></i> View Dashboard
                        </a>
                    </div>
                </div>

                <!-- Footer Note -->
                <div class="bg-[#121212] p-4 border-t border-[#2A2A2A] text-center">
                    <p class="text-[#A0A0A0] text-sm">
                        Need help? Contact <a href="mailto:support@rhythmx.com"
                            class="text-[#00F6FF] hover:underline">support@rhythmx.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection