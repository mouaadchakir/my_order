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
                <div class="border-b pb-4 mb-8">
                    <h3 class="font-bold text-lg mb-4">Filters</h3>
                    <p class="text-sm text-gray-600">Showing 1-12 of 36 results</p>
                </div>

                {{-- Color Filter --}}
                <div class="mb-8">
                    <h4 class="font-semibold mb-4">Color</h4>
                    <div class="flex flex-wrap gap-2">
                        <button class="w-8 h-8 rounded-full bg-white border-2 border-gray-300 focus:outline-none focus:border-blue-500"></button>
                        <button class="w-8 h-8 rounded-full bg-black focus:outline-none focus:border-blue-500"></button>
                        <button class="w-8 h-8 rounded-full bg-green-800 focus:outline-none focus:border-blue-500"></button>
                        <button class="w-8 h-8 rounded-full bg-blue-900 focus:outline-none focus:border-blue-500"></button>
                        <button class="w-8 h-8 rounded-full bg-yellow-600 focus:outline-none focus:border-blue-500"></button>
                        <button class="w-8 h-8 rounded-full bg-red-700 focus:outline-none focus:border-blue-500"></button>
                    </div>
                </div>

                {{-- Size Filter --}}
                <div class="mb-8">
                    <h4 class="font-semibold mb-4">Size</h4>
                    <div class="space-y-2 text-sm">
                        <label class="flex items-center"><input type="checkbox" class="mr-2"> 10x10 cm</label>
                        <label class="flex items-center"><input type="checkbox" class="mr-2"> 5x5 cm</label>
                        <label class="flex items-center"><input type="checkbox" class="mr-2"> Bejmat</label>
                    </div>
                </div>

                {{-- Price Filter --}}
                <div>
                    <h4 class="font-semibold mb-4">Price</h4>
                    <input type="range" min="0" max="500" class="w-full">
                    <div class="flex justify-between text-sm mt-2">
                        <span>€0</span>
                        <span>€500</span>
                    </div>
                </div>
            </aside>

            {{-- Product Grid --}}
            <main class="md:w-3/4">
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Product 1-9 (placeholders) --}}
                    @for ($i = 0; $i < 9; $i++)
                    <div class="text-center group">
                        <div class="bg-gray-100 p-4 relative">
                            <img src="https://i.imgur.com/d2L8a3a.jpg" alt="Zellige Tile" class="w-full mb-4 group-hover:scale-105 transition-transform">
                            <button class="absolute top-2 right-2 bg-white p-2 rounded-full shadow hover:bg-gray-200">&#128722;</button>
                        </div>
                        <h3 class="font-bold mt-4">Zellige Tile {{$i + 1}}</h3>
                        <p class="text-sm text-gray-500">Handmade Moroccan Tile</p>
                        <p class="font-semibold mt-2">€ 120.00</p>
                    </div>
                    @endfor
                </div>
                 {{-- Pagination --}}
                 <div class="mt-12 flex justify-center">
                    <nav class="flex space-x-2">
                        <a href="#" class="px-4 py-2 bg-gray-800 text-white">1</a>
                        <a href="#" class="px-4 py-2 border border-gray-300 hover:bg-gray-200">2</a>
                        <a href="#" class="px-4 py-2 border border-gray-300 hover:bg-gray-200">3</a>
                        <a href="#" class="px-4 py-2 border border-gray-300 hover:bg-gray-200">&rarr;</a>
                    </nav>
                </div>
            </main>
        </div>
    </div>
@endsection
