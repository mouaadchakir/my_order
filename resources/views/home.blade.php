@extends('layouts.app')

@section('styles')
<style>
    @keyframes marquee {
        from { transform: translateX(0); }
        to { transform: translateX(-100%); }
    }
    .marquee-container .animate-marquee {
        display: inline-block;
        animation: marquee 40s linear infinite;
        /* Add padding to the right of the span to create space */
        padding-right: 2rem; 
    }
</style>
@endsection

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
                    <img src="https://thumbs.dreamstime.com/z/moroccan-zellige-tile-pattern-riad-fes-morocco-32653886.jpg" alt="Moroccan Zellige Pool"width="50%" height="20%" >
                </div>
                <div class="md:w-1/2 text-gray-700">
                    <h2 class="text-3xl font-bold mb-4" style="font-family: serif;">Moroccan Zellige</h2>
                    <p class="mb-6 leading-relaxed">The journey of Moroccan metalwork doesn't end in the workshop. The items crafted by Moroccan artisans find their way into homes around the world, becoming cherished pieces in both traditional and modern settings [...]</p>
                    <a href="#" class="border border-gray-400 text-gray-800 py-2 px-6 hover:bg-gray-800 hover:text-white transition duration-300">Read more</a>
                </div>
            </div>
        </div>
    </div>

    {{-- New Product Showcase Section --}}
    <div class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div x-data="{ activeTab: 'all' }" class="w-full">
                <div class="flex justify-center border-b mb-12">
                    <nav class="flex flex-wrap justify-center space-x-4 md:space-x-8 text-sm text-gray-500">
                        <a href="#" @click.prevent="activeTab = 'all'" :class="{'border-b-2 border-gray-800 text-gray-800 font-semibold': activeTab === 'all'}" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">All</a>
                        <a href="#" @click.prevent="activeTab = 'travertine'" :class="{'border-b-2 border-gray-800 text-gray-800 font-semibold': activeTab === 'travertine'}" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">Travertine Tables</a>
                        <a href="#" @click.prevent="activeTab = 'iron'" :class="{'border-b-2 border-gray-800 text-gray-800 font-semibold': activeTab === 'iron'}" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">Iron Furniture</a>
                        <a href="#" @click.prevent="activeTab = 'tops'" :class="{'border-b-2 border-gray-800 text-gray-800 font-semibold': activeTab === 'tops'}" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">Table Tops</a>
                        <a href="#" @click.prevent="activeTab = 'decor'" :class="{'border-b-2 border-gray-800 text-gray-800 font-semibold': activeTab === 'decor'}" class="pb-2 hover:border-b-2 hover:border-gray-800 hover:text-gray-800 transition-colors">Home Decor Tiles</a>
                    </nav>
                </div>

                <div x-show="activeTab === 'all'">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                        {{-- Product 1 --}}
                        <div class="text-center group">
                            <div class="relative bg-gray-200 h-96 mb-4 flex items-center justify-center overflow-hidden">
                                
                                <img src="https://tse3.mm.bing.net/th/id/OIP.PtS7fkBtyUy6xXewMA4YGQHaLB?rs=1&pid=ImgDetMain&o=7&rm=3" alt="CUSTOM Made MOSAIC Mirror" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <h3 class="uppercase text-lg font-semibold tracking-wider">MIRRORS</h3>
                            <p class="text-gray-600">CUSTOM Made MOSAIC Mirror</p>
                            <p class="font-bold text-lg">€ 687.99</p>
                        </div>
                        {{-- Product 2 --}}
                        <div class="text-center group">
                            <div class="relative bg-gray-200 h-96 mb-4 flex items-center justify-center overflow-hidden">
                                
                                <img src="https://tse2.mm.bing.net/th/id/OIP.zr3naT9Ce7u5S89dQuVlJwAAAA?pid=ImgDet&w=300&h=300&rs=1&o=7&rm=3" alt="Set Of MOROCCAN IRON CHAIRS" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <h3 class="uppercase text-lg font-semibold tracking-wider">IRON CHAIRS</h3>
                            <p class="text-gray-600">Set Of MOROCCAN IRON CHAIRS</p>
                            <p class="font-bold text-lg">€ 687.99</p>
                        </div>
                        {{-- Product 3 --}}
                        <div class="text-center group">
                            <div class="relative bg-gray-200 h-96 mb-4 flex items-center justify-center overflow-hidden">
                                
                                <img src="https://tse1.mm.bing.net/th/id/OIP.NRrmrGpnHxk9yvpbvK1PvwHaJ7?rs=1&pid=ImgDetMain&o=7&rm=3" alt="MOSAIC Fountain" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <h3 class="uppercase text-lg font-semibold tracking-wider">FOUNTAINS</h3>
                            <p class="text-gray-600">MOSAIC Fountain</p>
                            <p class="font-bold text-lg">€ 1,200.00</p>
                        </div>
                    </div>
                </div>
                {{-- Add other tab panels here if needed --}}
                <div x-show="activeTab !== 'all'" class="text-center text-gray-500 py-16">
                    <p>Products for this category will be shown here.</p>
                </div>
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
                <img src="https://i0.wp.com/southerngirlgoneglobal.com/wp-content/uploads/2015/03/img_5565.jpg?ssl=1" alt="Zellige making process 1" class="w-full h-full object-cover">
                <img src="https://tse2.mm.bing.net/th/id/OIP.zeyAWR03zIQklFsihJxOdAHaLH?w=600&h=901&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Zellige making process 2" class="w-full h-full object-cover">
                <img src="https://i.pinimg.com/736x/31/4c/60/314c607b02dda4499a5024021c9ea02c.jpg" alt="Zellige making process 3" class="w-full h-full object-cover">
                <img src="https://i0.wp.com/southerngirlgoneglobal.com/wp-content/uploads/2015/03/img_5565.jpg?ssl=1" alt="Zellige making process 4" class="w-full h-full object-cover">
            </div>
        </div>
    </div>

    {{-- Gallery Section (Interactive) --}}
    <div class="bg-white" x-data="{
        currentPage: 1,
        totalPages: 3,
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        }
    }">
        <div class="container mx-auto px-4 py-16">
            <div class="border-t border-gray-300 mb-16"></div>
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800" style="font-family: serif;">Gallery</h2>
                <div class="flex items-center space-x-4 text-gray-500">
                    <span><span x-text="currentPage.toString().padStart(2, '0')"></span> / <span x-text="totalPages.toString().padStart(2, '0')"></span></span>
                    <div class="flex">
                        <button @click="prevPage()" :disabled="currentPage === 1" class="border border-gray-300 p-2 hover:bg-gray-200 transition disabled:opacity-50">&lt;</button>
                        <button @click="nextPage()" :disabled="currentPage === totalPages" class="border border-gray-300 p-2 -ml-px hover:bg-gray-200 transition disabled:opacity-50">&gt;</button>
                    </div>
                </div>
            </div>

            {{-- Page 1 --}}
            <div x-show="currentPage === 1" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-200 h-96"><img src="https://galeriedemesure.com/pict/produits/-la-table-en-zellige-blanche-et-vert-une-fusion-parfaite-de-l-artisanat-et-du-design-contemporain-2.jpg" alt="Gallery image 1" class="w-full h-full object-cover"></div>
                <div class="bg-gray-200 h-96"><img src="https://zellige-artisanat.com/wp-content/uploads/2022/11/tables-zelij.jpeg" alt="Gallery image 2" class="w-full h-full object-cover"></div>
                <div class="bg-gray-200 h-96"><img src="https://tse2.mm.bing.net/th/id/OIP.pBh2izpWK4FoZbKm89jXPQHaJ4?pid=ImgDet&w=474&h=632&rs=1&o=7&rm=3" alt="Gallery image 3" class="w-full h-full object-cover"></div>
            </div>

            {{-- Page 2 --}}
            <div x-show="currentPage === 2" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-200 h-96"><img src="https://tse2.mm.bing.net/th/id/OIP.9a2srswwEqialEkBECExLwHaJ4?pid=ImgDet&w=474&h=632&rs=1&o=7&rm=3" alt="Gallery image 1" class="w-full h-full object-cover"></div>
                <div class="bg-gray-200 h-96"><img src="https://www.table-mosaique.fr/media/images/upload/CLT%202.jpg" class="w-full h-full object-cover"></div>
                <div class="bg-gray-200 h-96"><img src="https://mosaic-table.co/wp-content/uploads/2021/02/SwansNeckChairSetting7.jpg" alt="Gallery image 3" class="w-full h-full object-cover"></div>
            </div>

            {{-- Page 3 --}}
            <div x-show="currentPage === 3" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-200 h-96"><img src="https://www.wilsonsyard.com/pub/media/catalog/product/cache/d181dd52bd4f603bf1b379b7c2677209/i/m/img_9716_2.jpg" alt="Gallery image 1" class="w-full h-full object-cover"></div>
                <div class="bg-gray-200 h-96"><img src="https://tse4.mm.bing.net/th/id/OIP.H1OB12ztgy8vrt3MqVmStwAAAA?w=400&h=325&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Gallery image 2" class="w-full h-full object-cover"></div>
                <div class="bg-gray-200 h-96"><img src="https://www.gaiaferroforgiato.it/wp-content/uploads/2020/02/Gaia_Impero-768x519.jpg" alt="Gallery image 3" class="w-full h-full object-cover"></div>
            </div>

            <div class="border-t border-gray-300 mt-16"></div>
        </div>
    </div>

    {{-- Custom Made Section (Interactive) --}}
    <div class="bg-[#F8F5F2] py-16" x-data="{
        currentIndex: 0,
        products: [
            {
                image: 'https://i.etsystatic.com/35955735/r/il/2a0b4e/4675899602/il_1080xN.4675899602_swsi.jpg',
                title: 'MOSAIC CHESS TABLE, Custom Made Gray And Dark',
                subtitle: 'Red Tiles Table'
            },
            {
                image: 'https://www.jawoll.de/media/39/78/76/1676467298/230296_18739-BistroSetMosaik60x60x71cm5fachsortiert-min.jpg', // Add image URL here
                title: 'Another Custom Product',
                subtitle: 'Description for product 2'
            },
            {
                image: 'https://i.otto.de/i/otto/55aa3738-9869-5f72-8531-4a74f8cdf37e/raburg-sitzgruppe-bistro-set-klara-1-x-mosaiktisch-in-bunt-2-x-klappbare-stuhle-3-teilig-metallgestell-in-schwarz-liebevolle-handarbeit-1-2-personen.jpg?$formatz$', // Add image URL here
                title: 'Third Custom Item',
                subtitle: 'Details about the third item'
            }
        ],
        next() {
            this.currentIndex = (this.currentIndex + 1) % this.products.length;
        },
        prev() {
            this.currentIndex = (this.currentIndex - 1 + this.products.length) % this.products.length;
        }
    }">
        <div class="marquee-container overflow-x-hidden whitespace-nowrap mb-12 relative">
            <span class="animate-marquee">
                <span class="mx-4 text-sm text-gray-600">Free Shipping</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Sustainably-Made</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Luxury Materials</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Exclusive Design</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Easy Returns</span>&bull;
            </span>
            <span class="animate-marquee">
                <span class="mx-4 text-sm text-gray-600">Free Shipping</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Sustainably-Made</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Luxury Materials</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Exclusive Design</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Easy Returns</span>&bull;
            </span>
            <span class="animate-marquee">
                <span class="mx-4 text-sm text-gray-600">Free Shipping</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Sustainably-Made</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Luxury Materials</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Exclusive Design</span>&bull;
                <span class="mx-4 text-sm text-gray-600">Easy Returns</span>&bull;
            </span>
        </div>
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold text-gray-800 mb-8" style="font-family: serif;">Custom Made</h>
            <div class="relative">
                <div class="bg-gray-200 h-[600px] flex items-center justify-center">
                    <template x-if="products[currentIndex].image">
                        <img :src="products[currentIndex].image" alt="Custom Made Product" class="w-full h-full object-cover">
                    </template>
                    <template x-if="!products[currentIndex].image">
                        <span class="text-gray-500">Image Placeholder</span>
                    </template>
                </div>
                <div class="absolute bottom-8 left-1/2 -translate-x-1/2 bg-white shadow-lg p-4 flex items-center justify-between w-full max-w-md">
                    <button @click="prev()" class="border rounded-full p-2 hover:bg-gray-100">
                        &larr;
                    </button>
                    <div class="text-center mx-4">
                        <p class="font-semibold text-sm" x-text="products[currentIndex].title"></p>
                        <p class="text-xs text-gray-600" x-text="products[currentIndex].subtitle"></p>
                    </div>
                    <button @click="next()" class="border rounded-full p-2 hover:bg-gray-100">
                        &rarr;
                    </button>
                </div>
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
                        <img src="https://i.imgur.com/d2L8a3a.jpg" alt="Customer photo 1" class="w-full mb-4">
                    </div>
                    {{-- Gallery Item 2 --}}
                    <div class="flex-shrink-0 w-72 text-center">
                        <img src="https://i.imgur.com/YqM0i6A.jpg" alt="Customer photo 2" class="w-full mb-4">
                    </div>
                    {{-- Gallery Item 3 --}}
                    <div class="flex-shrink-0 w-72 text-center">
                        <img src="https://i.imgur.com/O3G2Y2p.jpg" alt="Customer photo 3" class="w-full mb-4">
                    </div>
                    {{-- Gallery Item 4 --}}
                    <div class="flex-shrink-0 w-72 text-center">
                        <img src="https://i.imgur.com/gJ5R4j8.jpg" alt="Customer photo 4" class="w-full mb-4">
                    </div>
                    {{-- Gallery Item 5 --}}
                    <div class="flex-shrink-0 w-72 text-center">
                        <img src="https://i.imgur.com/bX3Ymyh.jpg" alt="Customer photo 5" class="w-full mb-4">
                    </div>
                </div>
                <button @click="scroll().left()" class="absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 z-10 hidden md:block">&larr;</button>
                <button @click="scroll().right()" class="absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 z-10 hidden md:block">&rarr;</button>
            </div>
        </div>
    </div>
@endsection