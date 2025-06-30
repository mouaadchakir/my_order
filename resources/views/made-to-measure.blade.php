@extends('layouts.app')

@section('content')
    {{-- Page Header --}}
    <div class="bg-[#F8F5F2]">
        <div class="container mx-auto px-4 py-12 text-center">
            <h1 class="text-4xl font-bold" style="font-family: serif;">Made-to-Measure</h1>
            <p class="text-gray-600 mt-2">Home / Made-to-Measure</p>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-4xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Create Your Custom Zellige</h2>
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
