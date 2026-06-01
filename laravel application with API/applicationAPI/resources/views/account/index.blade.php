@extends('layouts.shop')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Account</h1>
                <p class="text-gray-500 mt-1">Manage your account settings and preferences</p>
            </div>
            <a href="{{ route('shop.index') }}" class="mt-4 sm:mt-0 text-amber-600 hover:text-amber-700 font-medium">
                ← Continue Shopping
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-3">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <h3 class="font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                        <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="w-full px-4 py-3 rounded-xl text-left text-red-600 hover:bg-red-50">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-3 space-y-8">
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Personal Information</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input value="{{ auth()->user()->name }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input value="{{ auth()->user()->email }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Orders</h2>

                    @forelse($orders as $order)
                        <div class="border border-gray-100 rounded-xl p-4 mb-4">
                            <div class="flex justify-between">
                                <div>
                                    <p class="font-semibold">#{{ $order->order_number }}</p>
                                    <p class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold">₱{{ number_format($order->total, 2) }}</p>
                                    <p class="text-sm text-green-600">{{ $order->status }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No orders yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection