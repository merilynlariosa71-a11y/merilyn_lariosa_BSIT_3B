<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Luxe Bags</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html { scroll-behavior: smooth; }
        .animate-in { animation: fadeIn .3s ease-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(.95); }
            to { opacity: 1; transform: scale(1); }
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-white text-gray-900">
<div class="min-h-screen flex flex-col">
    @include('partials.header')

    <main class="flex-1">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 mt-4">
                <div class="bg-green-50 text-green-700 p-4 rounded-xl">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    @if(!request()->routeIs('checkout.confirmation'))
        @include('partials.footer')
    @endif
</div>
</body>
</html>