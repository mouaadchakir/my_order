@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Manage Images for: <span class="text-indigo-600">{{ $product->name }}</span></h1>
        <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-300">
            &larr; Back to Products
        </a>
    </div>

    {{-- Upload Form --}}
    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Upload New Image</h2>
        <form action="{{ route('admin.products.images.store', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Choose image:</label>
                <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('image')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                Upload Image
            </button>
        </form>
    </div>

    {{-- Image Gallery --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Existing Images</h2>
        @if($images->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p>No images found for this product yet.</p>
            </div>
        @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($images as $image)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" class="w-full h-48 object-cover rounded-lg shadow-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg">
                            <form action="{{ route('admin.product-images.destroy', $image) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white text-sm bg-red-600 hover:bg-red-700 py-2 px-4 rounded-full" onclick="return confirm('Are you sure you want to delete this image?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
