@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md px-8 py-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800">Email Verification</h2>
        <p class="mt-2 text-center text-gray-600">We've sent a 6-digit code to your email address. Please enter it below to verify your account.</p>

        <form method="POST" action="{{ route('verification.verify_code') }}" class="mt-6">
            @csrf

            <div>
                <label for="verification_code" class="text-sm font-medium text-gray-700">Verification Code</label>
                <input id="verification_code" name="verification_code" type="text" required autofocus
                       class="block w-full px-3 py-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('verification_code') border-red-500 @enderror">
                @error('verification_code')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Verify Account
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
