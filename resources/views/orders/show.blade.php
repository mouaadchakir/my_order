@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-8 max-w-4xl">
    <div class="py-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold leading-tight text-gray-800">Order Details</h2>
            <a href="{{ route('orders.index') }}" class="text-indigo-600 hover:text-indigo-900">&larr; Back to My Orders</a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Order #{{ $order->id }}</h3>
                <p class="text-sm text-gray-600">Placed on {{ $order->created_at->toFormattedDateString() }}</p>
            </div>

            <div class="px-6 py-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-2">Shipping Address</h4>
                        <p class="text-gray-600">{{ $order->user->name }}</p>
                        <p class="text-gray-600">{{ $order->user->email }}</p>
                        {{-- You might need to add address fields to your order or user model --}}
                        <p class="text-gray-600">123 Main St, Anytown, USA</p> 
                    </div>
                    <div class="text-right">
                        <h4 class="font-semibold text-gray-700 mb-2">Order Summary</h4>
                        <p class="text-gray-600">Status: <span class="font-medium text-green-600">{{ ucfirst($order->status) }}</span></p>
                        <p class="text-gray-800 font-bold text-xl mt-2">Total: ${{ number_format($order->total_amount, 2) }}</p>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 border-t">
                <h4 class="font-semibold text-gray-700 mb-4">Items in this Order</h4>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex items-center">
                            <div class="w-20 h-20 mr-4 flex-shrink-0">
                                <img src="{{ asset('storage/' . ($item->product->image_path ?? '')) }}" alt="{{ $item->product->name }}" class="rounded-md object-cover w-full h-full">
                            </div>
                            <div class="flex-grow">
                                <p class="font-semibold text-gray-800">{{ $item->product->name }}</p>
                                <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                            </div>
                            <p class="font-semibold text-gray-800">${{ number_format($item->price * $item->quantity, 2) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
