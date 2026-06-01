@extends('layouts.shop')

@section('content')
@php
    $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    $shipping = $subtotal > 5000 ? 0 : 99;
    $tax = $subtotal * 0.12;
    $total = $subtotal + $shipping + $tax;
@endphp

<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
        </div>

        <form method="POST" action="{{ route('checkout.store') }}" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @csrf

            <div class="lg:col-span-2 bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Shipping Information</h2>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <input name="first_name" placeholder="First Name" required class="px-4 py-3 border border-gray-200 rounded-xl">
                    <input name="last_name" placeholder="Last Name" required class="px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <input name="address" placeholder="Address" required class="w-full px-4 py-3 border border-gray-200 rounded-xl mb-4">

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-6">
                    <input name="city" placeholder="City" required class="px-4 py-3 border border-gray-200 rounded-xl">
                    <input name="state" placeholder="State" required class="px-4 py-3 border border-gray-200 rounded-xl">
                    <input name="zip_code" placeholder="ZIP Code" required class="px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <h2 class="text-xl font-semibold text-gray-900 mb-6 mt-8">Payment Details</h2>

                <input name="card_number" placeholder="Card Number" required class="w-full px-4 py-3 border border-gray-200 rounded-xl mb-4">

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input name="expiry" placeholder="MM/YY" required class="px-4 py-3 border border-gray-200 rounded-xl">
                    <input name="cvv" placeholder="CVV" required class="px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <input name="card_name" placeholder="Cardholder Name" required class="w-full px-4 py-3 border border-gray-200 rounded-xl mb-6">

                <button class="w-full py-4 bg-gray-900 text-white rounded-xl font-semibold hover:bg-gray-800">
                    Pay ₱{{ number_format($total, 2) }}
                </button>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 h-fit sticky top-24">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Order Summary</h2>

                @foreach($cart as $item)
                    <div class="flex justify-between text-sm mb-3">
                        <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                        <span>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                    </div>
                @endforeach

                <div class="border-t pt-4 mt-4 space-y-3">
                    <div class="flex justify-between"><span>Subtotal</span><span>₱{{ number_format($subtotal, 2) }}</span></div>
                    <div class="flex justify-between"><span>Shipping</span><span>{{ $shipping == 0 ? 'Free' : '₱'.number_format($shipping, 2) }}</span></div>
                    <div class="flex justify-between"><span>Tax</span><span>₱{{ number_format($tax, 2) }}</span></div>
                    <div class="flex justify-between text-lg font-bold border-t pt-3"><span>Total</span><span>₱{{ number_format($total, 2) }}</span></div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection