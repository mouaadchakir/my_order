@extends('layouts.app')

@section('content')
    {{-- Page Header --}}
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-4">Made to Measure Request</h1>
            <p class="text-center text-gray-600 mb-10">Have a specific size in mind? Fill out the form below and we'll get back to you with a custom quote.</p>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                    <p class="font-bold">Please fix the following errors:</p>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form action="{{ route('made-to-measure.store') }}" method="POST">
                    @csrf
                    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Your Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="name" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="mb-8">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number (Optional)</label>
                        <input type="tel" name="phone" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('phone') }}">
                    </div>

                    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Project Details</h2>
                    <div class="mb-6">
                        <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1">Select a Product (or specify below)</label>
                        <select name="product_id" id="product_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select a product...</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                            @endforeach
                            <option value="other">Other (please specify)</option>
                        </select>
                    </div>

                    <div class="mb-6" id="product_name_div" style="display: none;">
                        <label for="product_name" class="block text-sm font-medium text-gray-700 mb-1">Custom Product Name/Style</label>
                        <input type="text" name="product_name" id="product_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('product_name') }}">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="width" class="block text-sm font-medium text-gray-700 mb-1">Width (cm)</label>
                            <input type="number" name="width" id="width" step="0.1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('width') }}" required>
                        </div>
                        <div>
                            <label for="length" class="block text-sm font-medium text-gray-700 mb-1">Length (cm)</label>
                            <input type="number" name="length" id="length" step="0.1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('length') }}" required>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Additional Notes or Questions</label>
                        <textarea name="notes" id="notes" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('notes') }}</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-700 transition-colors duration-300 text-lg">
                            Submit Request
                        </button>
                    </div>
                </form>
                <p class="text-gray-600 leading-relaxed mb-12">
                    Have a specific design in mind? We specialize in creating custom, handmade Zellige tiles tailored to your exact specifications. Whether it's a unique color blend, a specific size, or a completely new pattern, our artisans can bring your vision to life. Fill out the form below to start the conversation with our design team.
                </p>
            </div>

            {{-- Custom Order Form --}}
            <form class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-8 border border-gray-200 shadow-lg">
                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500">
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500">
                </div>

                {{-- Dimensions --}}
                <div class="md:col-span-2">
                    <label for="dimensions" class="block text-sm font-medium text-gray-700 mb-1">Dimensions (e.g., 10x10 cm, custom shape)</label>
                    <input type="text" id="dimensions" name="dimensions" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500">
                </div>

                {{-- Colors --}}
                <div class="md:col-span-2">
                    <label for="colors" class="block text-sm font-medium text-gray-700 mb-1">Color Palette (e.g., blues, greens, custom hex codes)</label>
                    <input type="text" id="colors" name="colors" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500">
                </div>

                {{-- Message --}}
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Project Details</label>
                    <textarea id="message" name="message" rows="6" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500" placeholder="Please describe your project, the total area you need to cover, and any other relevant details."></textarea>
                </div>

                {{-- File Upload --}}
                <div class="md:col-span-2">
                    <label for="file-upload" class="block text-sm font-medium text-gray-700 mb-1">Inspiration (Optional)</label>
                    <input type="file" id="file-upload" name="file-upload" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    <p class="text-xs text-gray-500 mt-1">Upload an image, sketch, or mood board (.jpg, .png, .pdf)</p>
                </div>

                {{-- Submit Button --}}
                <div class="md:col-span-2 text-right">
                    <button type="submit" class="bg-gray-800 text-white px-8 py-3 hover:bg-gray-700 transition-colors">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
@endsection
