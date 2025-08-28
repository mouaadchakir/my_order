@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Admin Dashboard</h1>
    <p class="text-gray-600 mb-8">Welcome, Admin! This is your secure dashboard. From here, you can manage your store.</p>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-500">New Custom Requests</h2>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $newRequestsCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-500">Total Products</h2>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $productsCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-500">Total Users</h2>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $usersCount }}</p>
        </div>
    </div>

    <!-- Management Links -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            <h2 class="text-xl font-semibold mb-2">Manage Orders</h2>
            <p class="text-gray-600 mb-4">View and process customer orders.</p>
            <a href="{{ route('admin.orders.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Go to Orders &rarr;</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            <h2 class="text-xl font-semibold mb-2">Manage Products</h2>
            <p class="text-gray-600 mb-4">Add, edit, and delete products.</p>
            <a href="{{ route('admin.products.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Go to Products &rarr;</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            <h2 class="text-xl font-semibold mb-2">Manage Custom Requests</h2>
            <p class="text-gray-600 mb-4">View and manage made-to-measure orders.</p>
            <a href="{{ route('admin.requests.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Go to Requests &rarr;</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            <h2 class="text-xl font-semibold mb-2">Manage Contact Messages</h2>
            <p class="text-gray-600 mb-4">View messages from the contact form.</p>
            <a href="{{ route('admin.contacts.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Go to Messages &rarr;</a>
        </div>
    </div>
</div>
@endsection