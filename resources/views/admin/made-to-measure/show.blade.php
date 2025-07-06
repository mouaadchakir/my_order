@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Request Details</h1>
        <a href="{{ route('admin.requests.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600 transition-colors duration-300">
            &larr; Back to All Requests
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Request #{{ $request->id }}</h2>
                    <p class="text-sm text-gray-600">Received on: {{ $request->created_at->format('F j, Y, g:i a') }}</p>
                </div>
                <div>
                    <span class="px-3 py-1 text-sm font-semibold rounded-full 
                        @switch($request->status)
                            @case('New') bg-blue-100 text-blue-800 @break
                            @case('In Progress') bg-yellow-100 text-yellow-800 @break
                            @case('Completed') bg-green-100 text-green-800 @break
                            @case('Cancelled') bg-red-100 text-red-800 @break
                            @default bg-gray-100 text-gray-800
                        @endswitch">
                        {{ $request->status }}
                    </span>
                </div>
            </div>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
            <!-- Customer Information -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Customer Information</h3>
                <dl class="space-y-2">
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">Name:</dt>
                        <dd class="text-gray-800">{{ $request->name }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">Email:</dt>
                        <dd class="text-gray-800">{{ $request->email }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">Phone:</dt>
                        <dd class="text-gray-800">{{ $request->phone ?? 'Not provided' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Request Details -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Request Details</h3>
                <dl class="space-y-2">
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">Product Name:</dt>
                        <dd class="text-gray-800">{{ $request->product_name ?? 'N/A' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">Width:</dt>
                        <dd class="text-gray-800">{{ $request->width }} cm</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">Length:</dt>
                        <dd class="text-gray-800">{{ $request->length }} cm</dd>
                    </div>
                </dl>
            </div>

            <!-- Notes -->
            <div class="md:col-span-2">
                <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Notes</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-700">{{ $request->notes ?? 'No additional notes provided.' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
