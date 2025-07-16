@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 gap-12 items-start">
            <!-- Product Image Gallery -->
            <div x-data="{ mainImage: '{{ $product->images->isNotEmpty() ? asset('storage/' . $product->images->first()->image_path) : 'https://via.placeholder.com/600x800.png/f3f4f6/9ca3af?text=No+Image' }}' }" class="space-y-4">
                <div class="bg-gray-100 rounded-lg overflow-hidden">
                    <img :src="mainImage" alt="{{ $product->name }}" class="w-full h-auto object-cover transition-transform duration-500 ease-in-out transform hover:scale-105" style="height: 500px;">
                </div>
                <div class="flex space-x-2">
                    @foreach ($product->images as $image)
                        <button @click="mainImage = '{{ asset('storage/' . $image->image_path) }}'" class="w-24 h-24 bg-gray-100 rounded-md overflow-hidden focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Thumbnail" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Product Details -->
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" style="font-family: serif;">{{ $product->name }}</h1>
                <p class="text-2xl text-gray-700 mb-6">€{{ number_format($product->price, 2) }}</p>
                
                <div class="prose max-w-none text-gray-600 mb-6">
                    <p>{{ $product->description }}</p>
                </div>

                <!-- Add to Cart Form -->
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <div class="flex items-center space-x-4 mb-6">
                        <label for="quantity" class="font-semibold">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-20 border border-gray-300 rounded-md text-center focus:ring-gray-500 focus:border-gray-500">
                    </div>

                    <button type="submit" class="w-full bg-gray-800 text-white py-3 px-8 hover:bg-gray-700 transition duration-300 font-semibold rounded-md text-lg">
                        Add to Cart
                    </button>
                </form>

                <!-- Additional Info -->
                <div class="mt-8 text-sm text-gray-500">
                    <p><span class="font-semibold">Category:</span> Zellige</p>
                    <p><span class="font-semibold">SKU:</span> {{ $product->id }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
