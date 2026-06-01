@extends('layouts.shop')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-10">
    <div class="max-w-5xl mx-auto px-4">
        <a href="{{ route('shop.index') }}" class="text-amber-600 font-medium">← Back to Shop</a>

        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 mt-6 overflow-hidden grid md:grid-cols-2">
            <div class="bg-gray-100">
                <img src="{{ $product->image }}" class="w-full h-full object-cover">
            </div>

            <div class="p-8">
                <span class="inline-block bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-sm font-medium mb-4">
                    {{ $product->category }}
                </span>

                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                <div class="text-amber-400 mb-4">★★★★★ <span class="text-gray-500">({{ $product->reviews }} reviews)</span></div>
                <div class="text-3xl font-bold text-gray-900 mb-4">₱{{ number_format($product->price, 2) }}</div>
                <p class="text-gray-600 mb-6">{{ $product->description }}</p>

                <form method="POST" action="{{ route('cart.add', $product) }}">
                    @csrf

                    <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                    <select name="color" class="w-full px-4 py-3 border border-gray-200 rounded-xl mb-5">
                        @foreach($product->colors ?? [] as $color)
                            <option value="{{ $color }}">{{ $color }}</option>
                        @endforeach
                    </select>

                    <label class="block text-sm font-medium text-gray-700 mb-2">Size</label>
                    <select name="size" class="w-full px-4 py-3 border border-gray-200 rounded-xl mb-5">
                        @foreach($product->sizes ?? [] as $size)
                            <option value="{{ $size }}">{{ $size }}</option>
                        @endforeach
                    </select>

                    <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                    <input type="number" name="quantity" value="1" min="1" class="w-full px-4 py-3 border border-gray-200 rounded-xl mb-6">

                    <button class="w-full py-4 bg-gray-900 text-white rounded-xl font-semibold text-lg hover:bg-gray-800">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection