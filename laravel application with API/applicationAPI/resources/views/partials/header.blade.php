@php
    $cart = session('cart', []);
    $count = collect($cart)->sum('quantity');
@endphp

<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">
            <a href="{{ route('shop.index') }}" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-amber-200">
                    <span class="text-white text-xl font-bold">L</span>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
                        Luxe Bags
                    </h1>
                    <p class="text-[10px] sm:text-xs text-gray-500 tracking-widest uppercase">Premium Collection</p>
                </div>
            </a>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('shop.index') }}" class="text-sm font-medium {{ request()->routeIs('shop.index') ? 'text-amber-600' : 'text-gray-600 hover:text-gray-900' }}">Shop</a>
                <a href="#products" class="text-sm font-medium text-gray-600 hover:text-gray-900">Collections</a>
                <a href="#footer" class="text-sm font-medium text-gray-600 hover:text-gray-900">About</a>
            </nav>

            <div class="flex items-center space-x-3">
                @auth
                    <a href="{{ route('account.index') }}" class="hidden sm:flex items-center space-x-2 p-2 rounded-full hover:bg-gray-100">
                        <div class="w-9 h-9 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="text-sm font-medium text-gray-700">{{ explode(' ', auth()->user()->name)[0] }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-900 text-white rounded-full text-sm font-semibold hover:bg-gray-800">
                        Sign In
                    </a>
                @endauth

                <a href="{{ route('cart.index') }}" class="relative p-2 rounded-full hover:bg-gray-100">
                    <span class="text-2xl">🛒</span>
                    @if($count > 0)
                        <span class="absolute -top-1 -right-1 bg-amber-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                            {{ $count }}
                        </span>
                    @endif
                </a>
            </div>
        </div>
    </div>
</header>