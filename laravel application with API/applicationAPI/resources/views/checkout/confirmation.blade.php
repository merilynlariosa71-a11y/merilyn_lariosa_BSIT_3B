@extends('layouts.shop')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white flex items-center justify-center px-4 py-12">
    <div class="max-w-lg w-full">
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-lg text-center">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 text-green-500 text-4xl">
                ✓
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-2">Order Confirmed!</h1>
            <p class="text-gray-500 mb-8">Thank you for shopping with Luxe Bags</p>

            <div class="bg-gray-50 rounded-2xl p-6 mb-8">
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-left">
                        <p class="text-sm text-gray-500">Order Number</p>
                        <p class="font-mono font-semibold text-gray-900">#{{ $order->order_number }}</p>
                    </div>
                    <div class="text-left">
                        <p class="text-sm text-gray-500">Estimated Delivery</p>
                        <p class="font-semibold text-gray-900">{{ $order->estimated_delivery->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="text-left mb-8">
                <h3 class="font-semibold text-gray-900 mb-4">What happens next?</h3>
                <div class="space-y-4">
                    <p><span class="text-amber-600 font-bold">1.</span> Confirmation email has been recorded.</p>
                    <p><span class="text-amber-600 font-bold">2.</span> We will prepare your order within 24 hours.</p>
                    <p><span class="text-amber-600 font-bold">3.</span> Shipping updates will be available soon.</p>
                </div>
            </div>

            <a href="{{ route('shop.index') }}" class="block w-full py-4 bg-gray-900 text-white rounded-xl font-semibold hover:bg-gray-800">
                Continue Shopping
            </a>
        </div>
    </div>
</div>
@endsection