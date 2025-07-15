@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex flex-col md:flex-row md:space-x-8">
        {{-- Sidebar --}}
        <aside class="md:w-1/4 mb-8 md:mb-0">
            <h2 class="text-2xl font-bold mb-6 text-[#4A5568]">My Account</h2>
            <nav class="space-y-2 text-gray-600">
                <a href="#" class="flex items-center px-4 py-2 rounded-md bg-gray-200 text-[#4A5568] font-semibold">
                    <svg class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    My Details
                </a>
                <a href="/orders" class="flex items-center px-4 py-2 rounded-md hover:bg-gray-100">
                    <svg class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                    My Orders
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="flex items-center w-full px-4 py-2 text-gray-700 rounded-md hover:bg-gray-100">
                        <svg class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3" /></svg>
                        Log Out
                    </a>
                </form>
            </nav>
        </aside>

        {{-- Main Content --}}
        {{-- Main Content --}}
        <main class="md:w-3/4" x-data="{ tab: 'details' }">
            <div class="bg-white p-8 rounded-lg shadow-md">
                
                {{-- Tab Headers --}}
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button @click="tab = 'details'" :class="{ 'border-indigo-500 text-indigo-600': tab === 'details', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'details' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            My Details
                        </button>
                        <button @click="tab = 'password'" :class="{ 'border-indigo-500 text-indigo-600': tab === 'password', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'password' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Change Password
                        </button>
                        <button @click="tab = 'address'" :class="{ 'border-indigo-500 text-indigo-600': tab === 'address', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'address' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            My Address
                        </button>
                    </nav>
                </div>

                {{-- My Details Tab --}}
                <div x-show="tab === 'details'">
                    <h1 class="text-3xl font-bold mb-6 text-[#4A5568]">My Details</h1>
                    @if (session('status') === 'profile-updated')
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                            <span class="block sm:inline">Your profile has been updated successfully.</span>
                        </div>
                    @endif
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @method('PATCH')
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="px-6 py-2 text-white bg-[#4A5568] rounded-md hover:bg-opacity-80">Save Changes</button>
                        </div>
                    </form>
                </div>

                {{-- Change Password Tab --}}
                <div x-show="tab === 'password'" x-cloak>
                    <h1 class="text-3xl font-bold mb-6 text-[#4A5568]">Change Password</h1>
                     @if (session('status') === 'password-updated')
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                            <span class="block sm:inline">Your password has been updated successfully.</span>
                        </div>
                    @endif
                    <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                        @method('PUT')
                        @csrf
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                            <input type="password" id="current_password" name="current_password" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                            <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="px-6 py-2 text-white bg-[#4A5568] rounded-md hover:bg-opacity-80">Update Password</button>
                        </div>
                    </form>
                </div>

                {{-- My Address Tab --}}
                <div x-show="tab === 'address'" x-cloak>
                    <h1 class="text-3xl font-bold mb-6 text-[#4A5568]">My Address</h1>
                    <p class="text-gray-600">Manage your shipping and billing address.</p>
                    {{-- Address form will go here --}}
                </div>

            </div>
        </main>
    </div>
</div>
@endsection
