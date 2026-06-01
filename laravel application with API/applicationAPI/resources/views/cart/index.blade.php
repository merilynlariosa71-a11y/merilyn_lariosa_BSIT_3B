@extends('layouts.shop')

@section('content')
@php
    $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    $shipping = $subtotal > 5000 ? 0 : 99;
    $tax = $subtotal * 0.12;
    $total = $subtotal + $shipping + $tax;
@endphp

@if(count($cart) === 0)
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white flex items-center justify-center px-4">
    <div class="text-center max-w-md">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl">🛒</div>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Your Cart is Empty</h2>
        <p class="text-gray-500 mb-8">Looks like you haven't added any bags to your cart yet.</p>
        <a href="{{ route('shop.index') }}" class="px-8 py-4 bg-gray-900 text-white rounded-full font-semibold hover:bg-gray-800">
            Continue Shopping
        </a>
    </div>
</div>
@else
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
                <p class="text-gray-500 mt-1">{{ count($cart) }} item(s) in your cart</p>
            </div>
            <a href="{{ route('shop.index') }}" class="text-amber-600 hover:text-amber-700 font-medium">← Continue Shopping</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart as $key => $item)
                    <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border border-gray-100">
                        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
                            <img src="{{ $item['image'] }}" class="w-full sm:w-32 h-32 bg-gray-100 rounded-xl object-cover">

                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="font-semibold text-gray-900">{{ $item['name'] }}</h3>
                                        <p class="text-sm text-gray-500">{{ $item['color'] }} {{ $item['size'] ? '· '.$item['size'] : '' }}</p>
                                    </div>

                                    <form method="POST" action="{{ route('cart.remove') }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="key" value="{{ $key }}">
                                        <button class="text-red-500">Remove</button>
                                    </form>
                                </div>

                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center space-x-3 bg-gray-100 rounded-xl p-1">
                                        <form method="POST" action="{{ route('cart.update') }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="key" value="{{ $key }}">
                                            <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                                            <button class="w-8 h-8">−</button>
                                        </form>

                                        <span class="w-8 text-center font-medium">{{ $item['quantity'] }}</span>

                                        <form method="POST" action="{{ route('cart.update') }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="key" value="{{ $key }}">
                                            <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                                            <button class="w-8 h-8">+</button>
                                        </form>
                                    </div>

                                    <div class="text-right">
                                        <div class="text-lg font-bold text-gray-900">
                                            ₱{{ number_format($item['price'] * $item['quantity'], 2) }}
                                        </div>
                                        @if($item['quantity'] > 1)
                                            <div class="text-sm text-gray-500">₱{{ number_format($item['price'], 2) }} each</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 sticky top-24">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Order Summary</h2>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-gray-600"><span>Subtotal</span><span>₱{{ number_format($subtotal, 2) }}</span></div>
                        <div class="flex justify-between text-gray-600"><span>Shipping</span><span class="{{ $shipping == 0 ? 'text-green-500 font-medium' : '' }}">{{ $shipping == 0 ? 'Free' : '₱'.number_format($shipping, 2) }}</span></div>
                        <div class="flex justify-between text-gray-600"><span>Tax (12% VAT)</span><span>₱{{ number_format($tax, 2) }}</span></div>
                        <div class="border-t border-gray-100 pt-4 flex justify-between text-lg font-bold">
                            <span>Total</span><span>₱{{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    @if($shipping == 0)
                        <div class="bg-green-50 text-green-700 p-4 rounded-xl mb-6">You qualify for free shipping!</div>
                    @else
                        <div class="bg-amber-50 text-amber-700 p-4 rounded-xl mb-6">
                            Add ₱{{ number_format(5000 - $subtotal, 2) }} more for free shipping!
                        </div>
                    @endif

                    <a href="{{ route('checkout.index') }}" class="block text-center w-full py-4 bg-gray-900 text-white rounded-xl font-semibold hover:bg-gray-800">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection