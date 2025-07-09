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
                    <img src="data:image/jpeg;base64,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" alt="Moroccan Zellige Pool"width="50%" height="20%" >
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
