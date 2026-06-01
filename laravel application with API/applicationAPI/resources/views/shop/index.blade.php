@extends('layouts.shop')

@section('content')
<section class="relative bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1600')"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
        <div class="max-w-2xl">
            <span class="inline-block bg-amber-500/20 text-amber-400 px-4 py-2 rounded-full text-sm font-medium mb-6">
                ✨ New Collection 2024
            </span>

            @auth
                <div class="mb-2 text-amber-300 text-sm font-medium">
                    Welcome back! You're getting exclusive member pricing.
                </div>
            @endauth

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Discover Your <span class="text-amber-400">Perfect Bag</span>
            </h1>
            <p class="text-lg text-gray-300 mb-8 max-w-lg">
                Premium leather goods crafted with passion. Each piece tells a story of timeless elegance and modern functionality.
            </p>
            <a href="#products" class="inline-block px-8 py-4 bg-amber-500 text-gray-900 rounded-full font-semibold hover:bg-amber-400 transition-all">
                Shop Collection
            </a>
        </div>
    </div>
</section>

<section class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center"><div class="text-3xl font-bold">500+</div><div class="text-sm text-gray-500">Products</div></div>
            <div class="text-center"><div class="text-3xl font-bold">50K+</div><div class="text-sm text-gray-500">Happy Customers</div></div>
            <div class="text-center"><div class="text-3xl font-bold">4.9</div><div class="text-sm text-gray-500">Average Rating</div></div>
            <div class="text-center"><div class="text-3xl font-bold">100%</div><div class="text-sm text-gray-500">Satisfaction</div></div>
        </div>
    </div>
</section>

<section id="products" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
        <div class="mb-6 lg:mb-0">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Our Collection</h2>
            <p class="text-gray-500 mt-1">Showing {{ $products->count() }} products</p>
        </div>

        <form method="GET" class="flex flex-col sm:flex-row gap-3">
            <input name="search" value="{{ request('search') }}" placeholder="Search bags..."
                   class="px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500">
            <select name="sort" class="px-4 py-3 bg-white border border-gray-200 rounded-xl">
                <option value="featured">Featured</option>
                <option value="price-low" @selected(request('sort') === 'price-low')>Price: Low to High</option>
                <option value="price-high" @selected(request('sort') === 'price-high')>Price: High to Low</option>
                <option value="rating" @selected(request('sort') === 'rating')>Highest Rated</option>
                <option value="popular" @selected(request('sort') === 'popular')>Most Popular</option>
            </select>
            <button class="px-5 py-3 bg-gray-900 text-white rounded-xl">Apply</button>
        </form>
    </div>

    <div class="flex flex-wrap gap-2 mb-8">
        @foreach($categories as $category)
            <a href="{{ route('shop.index', array_merge(request()->except('category'), ['category' => $category])) }}"
               class="px-4 py-2 rounded-full text-sm font-medium {{ request('category', 'All') === $category ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                {{ $category }}
            </a>
        @endforeach
    </div>

    @if($products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-amber-200">
                    <a href="{{ route('shop.show', $product) }}">
                        <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                            <img src="{{ $product->image }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 left-4 bg-white/90 px-3 py-1 rounded-full">
                                <span class="text-xs font-medium text-gray-600">{{ $product->category }}</span>
                            </div>
                            @if($product->reviews > 200)
                                <div class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1 rounded-full">
                                    <span class="text-xs font-bold">Popular</span>
                                </div>
                            @endif
                        </div>
                    </a>

                    <div class="p-5">
                        <div class="flex items-center space-x-1 mb-2 text-amber-400">
                            ★★★★★ <span class="text-sm text-gray-500 ml-2">({{ $product->reviews }})</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $product->description }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-gray-900">₱{{ number_format($product->price, 2) }}</span>
                            <form method="POST" action="{{ route('cart.add', $product) }}">
                                @csrf
                                <input type="hidden" name="color" value="{{ $product->colors[0] ?? 'Black' }}">
                                <input type="hidden" name="size" value="{{ $product->sizes[0] ?? '' }}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="px-4 py-2 bg-gray-900 text-white rounded-xl text-sm hover:bg-gray-800">
                                    Quick Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16">
            <h3 class="text-lg font-medium text-gray-900 mb-2">No products found</h3>
            <p class="text-gray-500">Try adjusting your search or filter criteria.</p>
        </div>
    @endif
</section>

<section class="bg-gradient-to-r from-amber-500 to-orange-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Join the Luxe Bags Family</h2>
        <p class="text-white/80 mb-8">Subscribe to get exclusive offers, new arrivals, and styling tips.</p>
        <input placeholder="Enter your email" class="px-5 py-4 rounded-full w-full max-w-md">
    </div>
</section>
@endsection