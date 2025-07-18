@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">{{ __('messages.search_results') }}</h1>
            @if(!empty($query))
                <p class="text-lg text-gray-600 mt-2">{{ __('messages.for') }}: <span class="font-semibold">"{{ $query }}"</span></p>
            @endif
        </div>

        @if($products->isEmpty())
            <div class="text-center py-16">
                <p class="text-xl text-gray-500">{{ __('messages.no_products_found') }}</p>
                <a href="{{ route('home') }}" class="mt-4 inline-block bg-gray-800 text-white py-2 px-6 rounded-md hover:bg-gray-700 transition">{{ __('messages.back_to_home') }}</a>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="group relative">
                        <a href="{{ route('products.show', $product) }}">
                            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">{{ $product->name }}</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">€{{ number_format($product->price, 2) }}</p>
                        </a>
                        <form action="{{ route('cart.store') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="w-full bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-700 transition opacity-0 group-hover:opacity-100">{{ __('messages.add_to_cart') }}</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $products->appends(['query' => $query])->links() }}
            </div>
        @endif

    </div>
</div>
@endsection
