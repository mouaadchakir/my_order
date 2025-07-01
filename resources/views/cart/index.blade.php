@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex flex-col md:flex-row shadow-md my-10">
        <div class="w-full md:w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                <h2 class="font-semibold text-2xl">{{ count((array) session('cart')) }} Items</h2>
            </div>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Quantity</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Price</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Total</h3>
            </div>

            @php $total = 0 @endphp
            @if(session('cart') && count(session('cart')) > 0)
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        <div class="flex w-2/5">
                            <div class="w-20">
                                <img class="h-24" src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm">{{ $details['name'] }}</span>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $id }}" name="id">
                                    <button class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</button>
                                </form>
                            </div>
                        </div>
                        <div class="w-1/5">
                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center justify-center">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input class="mx-2 border text-center w-12 py-2" type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                <button type="submit" class="text-xs bg-gray-200 hover:bg-gray-300 px-2 py-1 rounded">Update</button>
                            </form>
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm">${{ number_format($details['price'], 2) }}</span>
                        <span class="text-center w-1/5 font-semibold text-sm">${{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                    </div>
                @endforeach
            @else
                <div class="text-center py-10">
                    <p class="text-gray-600">Your cart is empty.</p>
                </div>
            @endif

            <a href="{{ route('products.index') }}" class="flex font-semibold text-indigo-600 text-sm mt-10">
                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                Continue Shopping
            </a>
        </div>

        <div id="summary" class="w-full md:w-1/4 px-8 py-10 bg-gray-100">
            <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">Total</span>
                <span class="font-semibold text-sm">${{ number_format($total, 2) }}</span>
            </div>
            <div class="border-t mt-8">
                <a href="{{ route('checkout.index') }}" class="block text-center bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full rounded-md">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>
@endsection