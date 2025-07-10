@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-[#4A5568]">Login to Your Account</h2>
        
        <!-- Session Status -->
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" name="email" type="email" required autofocus autocomplete="username"
                       class="block w-full px-3 py-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                       class="block w-full px-3 py-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Forgot your password?</a>
                @endif
            </div>

            <div>
                <button type="submit" class="w-full px-4 py-2 font-medium text-white bg-[#4A5568] rounded-md hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#4A5568]">
                    Log in
                </button>
            </div>
        </form>

        <p class="text-sm text-center text-gray-600">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:underline">Sign up</a>
        </p>
    </div>
</div>
@endsection

