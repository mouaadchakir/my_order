@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Product</h1>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p class="font-bold">Please fix the following errors:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-8 rounded-lg shadow-md">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                <input type="number" name="price" id="price" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
                <p class="text-sm text-gray-500 mt-2">Leave blank to keep the current image.</p>
                @if($product->image_path)
                    <div class="mt-4">
                        <p class="font-medium">Current Image:</p>
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-32 h-32 rounded-lg object-cover mt-2">
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-600 transition-colors duration-300">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
