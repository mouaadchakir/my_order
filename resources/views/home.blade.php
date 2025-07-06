@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="relative h-screen w-full bg-cover bg-center text-white" style="background-image: url('https://images.pexels.com/photos/1388944/pexels-photo-1388944.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative z-10 flex flex-col items-start justify-end h-full text-left pb-16 md:pb-24 pl-8 md:pl-20">
            <h1 class="text-4xl md:text-6xl font-bold uppercase" style="font-family: serif;">30% DISCOUNT</h1>
            <p class="text-lg md:text-xl mt-2 max-w-md">Unique Handmade Moroccan Tiles Arts</p>
            <a href="#" class="mt-6 inline-block border-2 border-white text-white py-2 px-8 hover:bg-white hover:text-black transition duration-300 font-semibold">Discover</a>
        </div>
    </div>

    {{-- Features Bar --}}
    <div class="bg-white border-y border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-center items-center space-x-8 text-sm text-gray-500 overflow-x-auto whitespace-nowrap">
                <span>Sustainably-Made</span>
                <span class="text-gray-300">&bull;</span>
                <span>Luxury Materials</span>
                <span class="text-gray-300">&bull;</span>
                <span>Exclusive Design</span>
                <span class="text-gray-300">&bull;</span>
                <span>Easy Returns</span>
                <span class="text-gray-300">&bull;</span>
                <span>Free Shipping</span>
                <span class="text-gray-300">&bull;</span>
                <span>Sustainably-Made</span>
                <span class="text-gray-300">&bull;</span>
                <span>Luxury Materials</span>
            </div>
        </div>
    </div>

    {{-- Shop By Category Section --}}
    <div class="bg-[#F8F5F2] py-16">
        <div class="container mx-auto px-4" x-data="categoryCarousel()">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Shop By Category</h2>
                <div class="flex items-center space-x-2">
                    <a href="#" class="border border-gray-400 text-gray-800 py-2 px-6 hover:bg-gray-800 hover:text-white transition hidden sm:block">Discover All</a>
                    <button @click="scroll('left')" class="border border-gray-300 p-3 hover:bg-gray-800 hover:text-white transition">&lt;</button>
                    <button @click="scroll('right')" class="border border-gray-300 p-3 hover:bg-gray-800 hover:text-white transition">&gt;</button>
                </div>
            </div>

            <div class="relative">
                <div x-ref="container" class="flex overflow-x-auto space-x-6 pb-4 -mx-4 px-4 scrollbar-hide">
                    @if(isset($categories))
                        @foreach($categories as $category)
                            @if($category->products->isNotEmpty() && $category->products->first()->images->isNotEmpty())
                                @php
                                    $product = $category->products->first();
                                    $image = $product->images->first();
                                @endphp
                                <div class="flex-shrink-0 w-80 group">
                                    <div class="bg-white border border-gray-200 p-6">
                                        <div class="flex justify-between items-baseline mb-4">
                                            <h3 class="font-semibold text-lg">{{ $category->name }}</h3>
                                            <p class="text-sm text-gray-500">{{ $category->products_count }} items</p>
                                        </div>
                                        <a href="#" class="block mb-4 h-80 bg-gray-100">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                        </a>
                                        <a href="#" class="inline-block border border-gray-800 text-gray-800 py-2 px-6 hover:bg-gray-800 hover:text-white transition">DISCOVER</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        if (typeof categoryCarousel !== 'function') {
            function categoryCarousel() {
                return {
                    scroll(direction) {
                        const container = this.$refs.container;
                        if (!container || !container.querySelector('.group')) return;
                        const scrollAmount = container.querySelector('.group').clientWidth + 24; // Width of one item + space-x-6 (1.5rem = 24px)
                        if (direction === 'left') {
                            container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                        } else {
                            container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                        }
                    }
                }
            }
        }
    </script>
    {{-- Moroccan Zellige Section --}}
    <div class="bg-[#F8F5F2] py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <img src="https://i.imgur.com/9qfW4kU.jpg" alt="Moroccan Zellige Pool" class="w-full">
                </div>
                <div class="md:w-1/2 text-gray-700">
                    <h2 class="text-3xl font-bold mb-4" style="font-family: serif;">Moroccan Zellige</h2>
                    <p class="mb-6 leading-relaxed">The journey of Moroccan metalwork doesn't end in the workshop. The items crafted by Moroccan artisans find their way into homes around the world, becoming cherished pieces in both traditional and modern settings [...]</p>
                    <a href="#" class="border border-gray-400 text-gray-800 py-2 px-6 hover:bg-gray-800 hover:text-white transition duration-300">Read more</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Product Showcase Section --}}
    <div class="container mx-auto px-4 py-16">
        {{-- Tab Navigation --}}
        <div class="flex justify-center border-b mb-12">
            <nav class="flex flex-wrap justify-center space-x-4 md:space-x-8 text-xs sm:text-sm text-gray-500">
                <a href="#" class="pb-2 border-b-2 border-gray-800 text-gray-800 font-semibold">All</a>
                <a href="#" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">Travertine Tables</a>
                <a href="#" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">Iron Furniture</a>
                <a href="#" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">Table Tops</a>
                <a href="#" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">Home Decor Tiles</a>
                <a href="#" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">READY TO SHIP Fountains</a>
                <a href="#" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">CUSTOM MADE FOUNTAINS</a>
            </nav>
        </div>

        {{-- Product Grid/Carousel --}}
        <div class="relative">
            <div class="flex overflow-x-auto space-x-6 pb-4 -mx-4 px-4">
                {{-- Product 1 --}}
                <div class="flex-shrink-0 w-64 md:w-80 text-center group">
                    <div class="bg-gray-50 p-4">
                </div>
            </div>
            <div class="relative">
                <div x-ref="showcaseContainer" class="flex overflow-x-auto space-x-6 pb-4 -mx-4 px-4 scrollbar-hide">
                    {{-- Product Item 1-4 --}}
                    @for ($i = 0; $i < 4; $i++)
                    <div class="flex-shrink-0 w-72 text-center group">
                        <div class="bg-gray-100 p-4 relative">
                            <img src="https://i.imgur.com/d2L8a3a.jpg" alt="Zellige Tile" class="w-full mb-4 group-hover:scale-105 transition-transform">
                            <button class="absolute top-2 right-2 bg-white p-2 rounded-full shadow hover:bg-gray-200">&#128722;</button>
                        </div>
                        <h3 class="font-bold mt-4">Zellige Tile {{$i + 1}}</h3>
                        <p class="text-sm text-gray-500">Handmade Moroccan Tile</p>
                        <p class="font-semibold mt-2">€ 120.00</p>
                    </div>
                    @endfor
                    <div class="flex-shrink-0 w-72 text-center group">
                         <div class="bg-gray-100 p-4 relative h-full flex items-center justify-center">
                            <a href="#" class="text-center">
                                <p class="text-3xl font-bold text-gray-800 mb-2">&rarr;</p>
                                <p class="font-semibold">View All</p>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- Carousel Arrows --}}
                <button @click="scroll().left()" class="absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 z-10 hidden md:block">&larr;</button>
                <button @click="scroll().right()" class="absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 z-10 hidden md:block">&rarr;</button>
            </div>
        </div>
    </div>

    {{-- Discover Zellige Section --}}
    <div class="bg-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4" style="font-family: serif;">Discover how Moroccan Zellige is made.</h2>
            <p class="max-w-3xl mx-auto text-gray-600 mb-8">Moroccan zellige is a traditional mosaic tilework made from clay and crafted through a meticulous artisanal process. It begins with natural clay, usually sourced from Fez, which is soaked in water, kneaded by hand or foot, and shaped into the tiles. These are sun-dried, then fired in kilns to harden.</p>
            <a href="#" class="text-gray-800 font-semibold underline hover:no-underline">Explore More</a>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12">
                <img src="https://i.imgur.com/gJ5R4j8.jpg" alt="Zellige making process 1" class="w-full h-full object-cover">
                <img src="https://i.imgur.com/O3G2Y2p.jpg" alt="Zellige making process 2" class="w-full h-full object-cover">
                <img src="https://i.imgur.com/YqM0i6A.jpg" alt="Zellige making process 3" class="w-full h-full object-cover">
                <img src="https://i.imgur.com/d2L8a3a.jpg" alt="Zellige making process 4" class="w-full h-full object-cover">
            </div>
        </div>
    </div>

    {{-- About Blacksmithing Section --}}
    <div class="bg-[#F8F5F2] py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2 text-gray-700 md:order-2">
                    <h2 class="text-3xl font-bold mb-4" style="font-family: serif;">About Blacksmithing In Morocco</h2>
                    <p class="mb-6 leading-relaxed">The journey of Moroccan metalwork doesn't end in the workshop. The items crafted by Moroccan artisans find their way into homes around the world, becoming cherished pieces in both traditional and modern settings [...]</p>
                    <a href="#" class="border border-gray-400 text-gray-800 py-2 px-6 hover:bg-gray-800 hover:text-white transition duration-300">Read more</a>
                </div>
                <div class="md:w-1/2 md:order-1">
                    <img src="https://i.imgur.com/bX3Ymyh.jpg" alt="Moroccan Blacksmithing" class="w-full">
                </div>
            </div>
        </div>
    </div>

    {{-- Customer Gallery Section --}}
    <div x-data="{
        scroll() {
            const container = this.$refs.galleryContainer;
            return {
                left() {
                    container.scrollBy({ left: -300, behavior: 'smooth' });
                },
                right() {
                    container.scrollBy({ left: 300, behavior: 'smooth' });
                }
            }
        }
    }" class="bg-gray-100 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-12" style="font-family: serif;">Customer Gallery</h2>
            <div class="relative">
                <div x-ref="galleryContainer" class="flex overflow-x-auto space-x-6 pb-4 -mx-4 px-4 scrollbar-hide">
                    {{-- Gallery Item 1 --}}
                    <div class="flex-shrink-0 w-72 text-center">
                        <img src="https://i.imgur.com/3bXy4bB.jpg" alt="Customer gallery 1" class="w-full mb-4">
                        <p class="font-semibold">mariaserraaraujo</p>
                        <p class="text-sm text-gray-500">04 May, 2025</p>
                        <div class="flex justify-center mt-2 text-yellow-500">★★★★★</div>
                    </div>
                    {{-- Gallery Item 2 --}}
                    <div class="flex-shrink-0 w-72 text-center">
                        <img src="https://i.imgur.com/8eP2aR4.jpg" alt="Customer gallery 2" class="w-full mb-4">
                        <p class="font-semibold">mariaserraaraujo</p>
                        <p class="text-sm text-gray-500">04 May, 2025</p>
                        <div class="flex justify-center mt-2 text-yellow-500">★★★★★</div>
                    </div>
                    {{-- Gallery Item 3 --}}
                    <div class="flex-shrink-0 w-72 text-center">
                        <img src="https://i.imgur.com/rGk2Y2A.png" alt="Customer gallery 3" class="w-full mb-4">
                        <p class="font-semibold">mariaserraaraujo</p>
                        <p class="text-sm text-gray-500">04 May, 2025</p>
                        <div class="flex justify-center mt-2 text-yellow-500">★★★★★</div>
                    </div>
                    {{-- Gallery Item 4 --}}
                    <div class="flex-shrink-0 w-72 text-center">
                        <img src="https://i.imgur.com/sM4Z3hX.png" alt="Customer gallery 4" class="w-full mb-4">
                        <p class="font-semibold">mariaserraaraujo</p>
                        <p class="text-sm text-gray-500">04 May, 2025</p>
                        <div class="flex justify-center mt-2 text-yellow-500">★★★★★</div>
                    </div>
                </div>
                {{-- Carousel Arrows --}}
                <button @click="scroll().left()" class="absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 z-10 hidden md:block">&larr;</button>
                <button @click="scroll().right()" class="absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 z-10 hidden md:block">&rarr;</button>
            </div>
            <div class="flex justify-center space-x-2 mt-8">
                <button class="w-2 h-2 rounded-full bg-gray-800"></button>
                <button class="w-2 h-2 rounded-full bg-gray-400 hover:bg-gray-800"></button>
                <button class="w-2 h-2 rounded-full bg-gray-400 hover:bg-gray-800"></button>
            </div>
        </div>
    </div>

    {{-- Features Grid Section --}}
    <div class="bg-[#2c5b56] text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-12 text-center">
                <div>
                    <div class="text-4xl mb-4">&#11088;</div>
                    <h3 class="text-xl font-bold mb-2">Rave reviews</h3>
                    <p class="text-gray-300">Average review rating is 4.8 or higher</p>
                </div>
                <div>
                    <div class="text-4xl mb-4">&#128666;</div>
                    <h3 class="text-xl font-bold mb-2">Smooth dispatch</h3>
                    <p class="text-gray-300">Has a history of dispatching on time with tracking.</p>
                </div>
                <div>
                    <div class="text-4xl mb-4">&#128232;</div>
                    <h3 class="text-xl font-bold mb-2">Speedy replies</h3>
                    <p class="text-gray-300">Has a history of replying to messages quickly.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- About Us Section --}}
    <div class="bg-[#F8F5F2] py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2 text-gray-700">
                    <h2 class="text-3xl font-bold mb-4" style="font-family: serif;">About Us</h2>
                    <p class="mb-4 leading-relaxed">Welcome to our tiles art world. Our shop offers you the opportunity to create your own design with colors of YOUR CHOICE that harmonize with the decor of your place. Also we do offer a wholesale program with great discounts. Please do not hesitate to connect us for more information. We are always available to answer.</p>
                </div>
                <div class="md:w-1/2">
                    <div class="relative bg-gray-400 aspect-video flex items-center justify-center">
                        <img src="https://i.imgur.com/eAn3xUl.jpg" alt="Tiling process video placeholder" class="w-full h-full object-cover">
                        <button class="absolute text-white bg-black bg-opacity-50 rounded-full p-4">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6V4z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
