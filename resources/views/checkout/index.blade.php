@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Secure Checkout</h1>

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            {{-- Left Column: Shipping and Payment --}}
            <div class="lg:col-span-3">
                <form action="{{ route('checkout.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg">
                    @csrf
                    
                    {{-- Shipping Information --}}
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold mb-6 border-b pb-4">Shipping Information</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                <input type="text" id="address" name="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3" required>
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                <input type="text" id="city" name="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3" required>
                            </div>
                            <div>
                                <label for="zip" class="block text-sm font-medium text-gray-700 mb-1">ZIP / Postal Code</label>
                                <input type="text" id="zip" name="zip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3" required>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Details --}}
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold mb-6 border-b pb-4">Payment Details</h2>
                        <p class="text-gray-600">Payment gateway integration is pending. For now, click "Place Order" to complete the transaction.</p>
                    </div>

                    {{-- Place Order Button --}}
                    <div>
                        <button type="submit" class="w-full bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 font-semibold text-lg transition duration-300">Place Order</button>
                    </div>
                </form>
            </div>

            {{-- Right Column: Order Summary --}}
            <div class="lg:col-span-2">
                <div class="bg-white p-8 rounded-lg shadow-lg sticky top-8">
                    <h2 class="text-2xl font-semibold mb-6 border-b pb-4">Your Order</h2>
                    
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        <div class="space-y-6">
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <div class="flex items-center">
                                <div class="w-20 h-20 mr-4 flex-shrink-0">
                                    <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="rounded-md object-cover w-full h-full">
                                </div>
                                <div class="flex-grow">
                                    <p class="font-semibold text-gray-800">{{ $details['name'] }}</p>
                                    <p class="text-sm text-gray-600">Qty: {{ $details['quantity'] }}</p>
                                </div>
                                <p class="font-semibold text-gray-800">${{ number_format($details['price'] * $details['quantity'], 2) }}</p>
                            </div>
                        @endforeach
                        </div>

                        <div class="border-t mt-6 pt-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600">Subtotal</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Shipping</span>
                                <span class="text-green-500 font-semibold">FREE</span>
                            </div>
                            <div class="flex justify-between font-bold text-xl text-gray-800">
                                <span>Total</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-600">Your cart is empty.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection