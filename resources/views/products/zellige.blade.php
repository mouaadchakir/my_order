@extends('layouts.app')

@section('content')
    <div class="bg-[#F8F5F2]">
        <div class="container mx-auto px-4 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold" style="font-family: serif;">Zellige</h1>
                <p class="text-gray-600 mt-2">Home / Zellige</p>
            </div>
        </div>
    </div>
    
    <div class="container mx-auto px-4 py-16">
        <div class="flex flex-col md:flex-row gap-12">
            {{-- Filters Sidebar --}}
            <aside class="md:w-1/4">
                <form action="{{ route('products.zellige') }}" method="GET">
                    <div class="border-b pb-4 mb-8">
                        <h3 class="font-bold text-lg mb-4">Filters</h3>
                        <p class="text-sm text-gray-600">Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                    </div>

                    {{-- Color Filter --}}
                    <div class="mb-8">
                        <h4 class="font-semibold mb-4">Color</h4>
                        <div class="space-y-2">
                            @foreach($availableColors as $color)
                                <label class="flex items-center text-sm">
                                    <input type="checkbox" name="colors[]" value="{{ $color }}" class="mr-2 rounded" {{ in_array($color, $oldInput['colors'] ?? []) ? 'checked' : '' }}>
                                    {{ ucfirst($color) }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Size Filter --}}
                    <div class="mb-8">
                        <h4 class="font-semibold mb-4">Size</h4>
                        <div class="space-y-2 text-sm">
                           @foreach($availableSizes as $size)
                                <label class="flex items-center">
                                    <input type="checkbox" name="sizes[]" value="{{ $size }}" class="mr-2 rounded" {{ in_array($size, $oldInput['sizes'] ?? []) ? 'checked' : '' }}>
                                    {{ $size }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Price Filter --}}
                    <div class="mb-8" x-data="{ minPrice: {{ $oldInput['min_price'] ?? 0 }}, maxPrice: {{ $oldInput['max_price'] ?? 500 }} }">
                        <h4 class="font-semibold mb-4">Price</h4>
                        <div class="relative">
                            <input type="range" min="0" max="500" x-model="minPrice" name="min_price" class="absolute w-full h-2 pointer-events-none appearance-none z-20" style="background: none;">
                            <input type="range" min="0" max="500" x-model="maxPrice" name="max_price" class="absolute w-full h-2 pointer-events-none appearance-none z-20" style="background: none;">
                            <div class="h-2 bg-gray-200 rounded-full relative z-10">
                                <div class="h-2 bg-gray-800 rounded-full absolute z-10" :style="`left: ${(minPrice / 500) * 100}%; right: ${100 - (maxPrice / 500) * 100}%`"></div>
                            </div>
                        </div>
                        <div class="flex justify-between text-sm mt-4">
                            <span>€<span x-text="minPrice"></span></span>
                            <span>€<span x-text="maxPrice"></span></span>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-700 transition">Apply Filters</button>
                </form>
            </aside>

            {{-- Product Grid --}}
            <main class="md:w-3/4">
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($products as $product)
                        <div class="text-center group">
                            <div class="bg-gray-100 p-4 relative">
                                <a href="{{ route('products.show', $product) }}">
                                    @if($product->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover mb-4 group-hover:scale-105 transition-transform">
                                    @else
                                        <img src="https://via.placeholder.com/300x400.png/f3f4f6/9ca3af?text=No+Image" alt="No image available" class="w-full h-64 object-cover mb-4">
                                    @endif
                                </a>
                                <form action="{{ route('cart.store') }}" method="POST" class="absolute top-2 right-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="bg-white p-2 rounded-full shadow hover:bg-gray-200 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <h3 class="font-bold mt-4">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}</p>
                            <p class="font-semibold mt-2">€{{ number_format($product->price, 2) }}</p>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-lg text-gray-600">No Zellige products found at the moment.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            </main>
        </div>
    </div>
@endsection
