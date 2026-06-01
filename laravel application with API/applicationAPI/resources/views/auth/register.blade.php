@extends('layouts.shop')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl animate-in">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
                L
            </div>
            <h2 class="text-2xl font-bold text-gray-900">Create Account</h2>
            <p class="text-gray-500 mt-1">Join Luxe Bags today</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            @csrf

            <input name="name" placeholder="Full Name" required class="w-full px-4 py-3 border border-gray-200 rounded-xl">
            <input type="email" name="email" placeholder="Email Address" required class="w-full px-4 py-3 border border-gray-200 rounded-xl">
            <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-3 border border-gray-200 rounded-xl">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full px-4 py-3 border border-gray-200 rounded-xl">

            <button class="w-full py-4 bg-gray-900 text-white rounded-xl font-semibold hover:bg-gray-800">
                Create Account
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-amber-600 font-semibold">Sign In</a>
        </p>
    </div>
</div>
@endsection