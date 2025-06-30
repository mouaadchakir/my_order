@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-[#4A5568]">Create a New Account</h2>

        <form method="POST" action="{{ route('register.post') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                <input id="name" name="name" type="text" required autofocus autocomplete="name"
                       class="block w-full px-3 py-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="email" class="text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" name="email" type="email" required autocomplete="username"
                       class="block w-full px-3 py-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required autocomplete="new-password"
                       class="block w-full px-3 py-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                       class="block w-full px-3 py-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <button type="submit" class="w-full px-4 py-2 font-medium text-white bg-[#4A5568] rounded-md hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#4A5568]">
                    Register
                </button>
            </div>
        </form>

        <p class="text-sm text-center text-gray-600">
            Already have an account? 
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:underline">Log in</a>
        </p>
    </div>
</div>
@endsection

