<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover authentic, handmade Moroccan tiles (Zellige) at KESHTILES. High-quality, sustainable materials and exclusive designs for a unique home aesthetic.">
    <meta name="keywords" content="Moroccan tiles, Zellige, handmade tiles, KESHTILES, sustainable, luxury materials, home decor, interior design">
    <title>KESHTILES - Handmade Moroccan Zellige Tiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body class="bg-white font-sans">
    {{-- Header --}}
    <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 bg-white z-50 shadow-md text-[#4A5568]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-3 items-center py-4">
                {{-- Left Navigation (Desktop) --}}
                <nav class="hidden md:flex justify-start items-center space-x-6 text-xs font-medium">
                    <div x-data="{ open: false }" @mouseleave="open = false" class="relative">
                        <a @mouseover="open = true" href="{{ route('products.zellige') }}" class="flex items-center hover:opacity-75">
                            PRODUCTS ZELLIGE
                            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </a>
                        <div x-show="open" x-transition class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Classic Zellige</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bejmat Tiles</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mosaic Borders</a>
                        </div>
                    </div>
                    <a href="{{ route('made-to-measure.create') }}" class="hover:opacity-75">MADE-TO-MEASURE</a>
                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="hover:opacity-75 text-red-500 font-bold">ADMIN DASHBOARD</a>
                        @endif
                    @endauth
                    <div x-data="{ open: false }" @mouseleave="open = false" class="relative">
                        <a @mouseover="open = true" href="#" class="flex items-center hover:opacity-75">
                            ABOUT | FAQ
                            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </a>
                        <div x-show="open" x-transition class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">About Us</a>
                            <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">FAQ</a>
                        </div>
                    </div>
                    
                </nav>

                {{-- Hamburger Menu (Mobile) --}}
                <div class="md:hidden justify-start">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="hover:opacity-75 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>

                {{-- Logo --}}
                <div class="text-center text-2xl md:text-3xl font-bold tracking-wider" style="font-family: serif;">
                    <a href="/" class="flex items-center justify-center">
                        <svg class="h-8 w-8 mr-2" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H8v-2h3V7l4 4-4 4z"/></svg>
                        KESHTILES
                    </a>
                </div>

                {{-- Right Side (Desktop) --}}
                <div class="hidden md:flex justify-end items-center space-x-4 text-xs font-medium">
                    <a href="#" class="hover:opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                    </a>
                    <a href="{{ route('contact.create') }}" class="hover:opacity-75">CONTACT</a>
                    <div x-data="{ open: false }" @mouseleave="open = false" class="relative">
                        
                        <button @mouseover="open = true" class="flex items-center hover:opacity-75">
                            Morocco | EUR
                            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </button>
                        <div x-show="open" x-transition class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">France | EUR</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">USA | USD</a>
                        </div>
                    </div>
                    <div x-data="{ open: false }" @mouseleave="open = false" class="relative">
                        <button @mouseover="open = true" class="flex items-center hover:opacity-75">
                            English
                            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </button>
                        <div x-show="open" x-transition class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Français</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">العربية</a>
                        </div>
                    </div>
                    @auth
                        <a href="{{ route('profile.edit') }}" class="relative text-[#4A5568] hover:opacity-80">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="relative text-[#4A5568] hover:opacity-80">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                        </a>
                    @endauth
                    <a href="{{ route('cart.index') }}" class="relative text-[#4A5568] hover:opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.658-.463 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                        @if(count((array) session('cart')) > 0)
                        <span class="absolute -top-2 -right-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                            {{ count((array) session('cart')) }}
                        </span>
                        @endif
                    </a>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="mobileMenuOpen" x-transition class="md:hidden pb-4">
                <nav class="flex flex-col space-y-4 text-xs font-medium text-[#4A5568]">
                    <a href="{{ route('products.zellige') }}" class="hover:opacity-75">PRODUCTS ZELLIGE</a>
                    <a href="{{ route('made-to-measure.create') }}" class="hover:opacity-75">MADE-TO-MEASURE</a>
                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="hover:opacity-75 text-red-500 font-bold">ADMIN DASHBOARD</a>
                        @endif
                    @endauth
                    <a href="{{ route('about') }}" class="hover:opacity-75">ABOUT US</a>
                    <a href="{{ route('faq') }}" class="hover:opacity-75">FAQ</a>
                    <a href="{{ route('contact.create') }}" class="hover:opacity-75">CONTACT</a>
                    <div class="pt-4 mt-4 border-t border-gray-200 space-y-2">
                        <a href="#" class="block hover:opacity-75">Morocco | EUR</a>
                        <a href="#" class="block hover:opacity-75">English</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-[#F8F5F2] text-gray-700 py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                {{-- About & Newsletter --}}
                <div class="lg:col-span-2">
                    <h3 class="font-bold text-lg mb-4">KESHTILES</h3>
                    <p class="text-sm mb-4 max-w-md">Unique Handmade Moroccan Tiles Arts. Sign up for our newsletter to get the latest news, inspiration and deals.</p>
                    <form class="flex">
                        <input type="email" placeholder="Enter your email" class="w-full px-4 py-2 border border-r-0 border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#2c5b56]">
                        <button type="submit" class="bg-[#2c5b56] text-white px-6 py-2 hover:bg-[#1e403c] transition-colors">Subscribe</button>
                    </form>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h3 class="font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="hover:underline">Home</a></li>
                        <li><a href="{{ route('products.zellige') }}" class="hover:underline">Products Zellige</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Products</a>
                  <a href="{{ route('contact.create') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a></li>
                        <li><a href="{{ route('about') }}" class="hover:underline">About Us</a></li>
                    </ul>
                </div>

                {{-- Help & Social --}}
                <div>
                    <h3 class="font-semibold mb-4">Help</h3>
                    <ul class="space-y-2 text-sm mb-6">
                        <li><a href="{{ route('faq') }}" class="hover:underline">FAQ</a></li>
                        <li><a href="#" class="hover:underline">Shipping & Returns</a></li>
                        <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                    </ul>
                    <h3 class="font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-gray-900"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z"/></svg></a>
                        <a href="#" class="text-gray-600 hover:text-gray-900"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616v.064c0 2.298 1.634 4.212 3.791 4.649-.69.188-1.432.233-2.193.084.604 1.881 2.349 3.251 4.425 3.289-1.798 1.407-4.069 2.245-6.533 2.245-.425 0-.845-.025-1.259-.074 2.324 1.493 5.078 2.368 8.04 2.368 8.284 0 12.812-6.862 12.812-12.812 0-.195-.005-.39-.014-.583.881-.636 1.64-1.428 2.24-2.324z"/></svg></a>
                        <a href="#" class="text-gray-600 hover:text-gray-900"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg></a>
                    </div>
                </div>
                    
                </div>
            </div>

            <div class="border-t pt-8 flex flex-col md:flex-row justify-between items-center text-sm">
                <p>&copy; 2025 KeshTiles. All Rights Reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    {{-- Social Media Icons --}}
                   
                </div>
                <div class="mt-4 md:mt-0">
                    {{-- Payment Icons --}} 
                    <span>VISA</span> | <span>MC</span> | <span>AMEX</span> | <span>PAYPAL</span>
                </div>
            </div>
        </div>
    </footer>

    {{-- Back to Top Button --}}
    <div x-data="{ showBackToTop: false }" @scroll.window="showBackToTop = (window.pageYOffset > 400) ? true : false" class="fixed bottom-5 right-5 z-50">
        <button x-show="showBackToTop" @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="bg-[#2c5b56] text-white p-3 rounded-full shadow-lg hover:bg-[#1e403c] transition-transform transform hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div>

</body>
</html>