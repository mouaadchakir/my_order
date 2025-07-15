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
     @vite(['resources/css/app.css', 'resources/js/app.js']) 
    <style>
        .marquee-container {
            overflow: hidden;
            background-color: #4A5568; /* Corresponds to text-[#4A5568] */
            color: white;
            padding: 0.5rem 0;
            white-space: nowrap;
        }
        .marquee-content {
            display: inline-block;
            animation: marquee 40s linear infinite;
        }
        .marquee-content span {
            padding: 0 2rem; /* Adds space between repetitions */
        }
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
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
                            {{ __('messages.products_zellige') }}
                            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </a>
                        <div x-show="open" x-transition class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Classic Zellige</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bejmat Tiles</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mosaic Borders</a>
                        </div>
                    </div>
                    <a href="{{ route('made-to-measure.create') }}" class="hover:opacity-75">{{ __('messages.made_to_measure') }}</a>
                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="hover:opacity-75 text-red-500 font-bold">{{ __('messages.admin_dashboard') }}</a>
                        @endif
                    @endauth
                    <div x-data="{ open: false }" @mouseleave="open = false" class="relative">
                        <a @mouseover="open = true" href="#" class="flex items-center hover:opacity-75">
                            {{ __('messages.about_faq') }}
                            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </a>
                        <div x-show="open" x-transition class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('messages.about_us') }}</a>
                            <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('messages.faq') }}</a>
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
                    <a href="{{ route('contact.create') }}" class="hover:opacity-75">{{ __('messages.contact') }}</a>
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
                            <span class="font-bold">{{ strtoupper(app()->getLocale()) }}</span>
                            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </button>
                        <div x-show="open" x-transition class="absolute right-0 z-10 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('messages.english') }}</a>
                            <a href="{{ route('lang.switch', 'fr') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('messages.french') }}</a>
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
                    <a href="{{ route('products.zellige') }}" class="hover:opacity-75">{{ __('messages.products_zellige') }}</a>
                    <a href="{{ route('made-to-measure.create') }}" class="hover:opacity-75">{{ __('messages.made_to_measure') }}</a>
                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="hover:opacity-75 text-red-500 font-bold">{{ __('messages.admin_dashboard') }}</a>
                        @endif
                    @endauth
                    <a href="{{ route('about') }}" class="hover:opacity-75">{{ __('messages.about_us') }}</a>
                    <a href="{{ route('faq') }}" class="hover:opacity-75">{{ __('messages.faq') }}</a>
                    <a href="{{ route('contact.create') }}" class="hover:opacity-75">{{ __('messages.contact') }}</a>
                    <div class="pt-4 mt-4 border-t border-gray-200 space-y-2">
                        <a href="#" class="block hover:opacity-75">Morocco | EUR</a>
                        <div x-data="{ open: false }" class="relative">
                            <a @click.prevent="open = !open" href="#" class="flex items-center hover:opacity-75">
                                <span class="font-bold">{{ strtoupper(app()->getLocale()) }}</span>
                                <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2">
                                <a href="{{ route('lang.switch', 'en') }}" class="block pl-4 text-sm text-gray-700 hover:bg-gray-100">{{ __('messages.english') }}</a>
                                <a href="{{ route('lang.switch', 'fr') }}" class="block pl-4 text-sm text-gray-700 hover:bg-gray-100">{{ __('messages.french') }}</a>
                            </div>
                        </div>
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
    <footer class="bg-[#F8F5F2] text-gray-800 pt-16 pb-8 font-sans">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-12">
                
                {{-- Quick Access --}}
                <div class="lg:col-span-1">
                    <h3 class="font-semibold mb-4 uppercase tracking-wider text-sm">Quick Access</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="/" class="hover:underline">Home</a></li>
                        <li><a href="#" class="hover:underline">All collections</a></li>
                        <li><a href="{{ route('about') }}" class="hover:underline">About</a></li>
                        <li><a href="#" class="hover:underline">Blogs</a></li>
                    </ul>
                </div>

                {{-- Customer services --}}
                <div class="lg:col-span-1">
                    <h3 class="font-semibold mb-4 uppercase tracking-wider text-sm">Customer services</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="{{ route('contact.create') }}" class="hover:underline">Customer Support</a></li>
                        <li><a href="#" class="hover:underline">Track Your Orders</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:underline">FAQ</a></li>
                        <li><a href="#" class="hover:underline">Sitemap</a></li>
                    </ul>
                </div>

                {{-- Store Policies --}}
                <div class="lg:col-span-1">
                    <h3 class="font-semibold mb-4 uppercase tracking-wider text-sm">Store Policies</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="#" class="hover:underline">Returns & Refund</a></li>
                        <li><a href="#" class="hover:underline">Terms of Services</a></li>
                        <li><a href="#" class="hover:underline">Delivery Policy</a></li>
                        <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                    </ul>
                </div>

                {{-- Newsletter --}}
                <div class="lg:col-span-2">
                    <h3 class="text-2xl mb-4" style="font-family: 'Cormorant Garamond', serif;">Join our newsletter and get $20 for your first order</h3>
                    <form class="flex mb-6">
                        <input type="email" placeholder="Your email address.." class="w-full px-4 py-3 bg-white border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        <button type="submit" class="bg-gray-800 text-white px-6 py-3 hover:bg-gray-700 transition-colors font-semibold text-sm">Subscribe</button>
                    </form>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-700 hover:text-gray-900">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="text-gray-700 hover:text-gray-900">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.477 2 2 6.477 2 12c0 1.99.59 3.822 1.583 5.332l-1.25 4.375 4.5-1.25A9.94 9.94 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm-1.083 14.417c-.229.114-.488.171-.747.171-.286 0-.571-.057-.857-.171-1.028-.4-1.885-1.171-2.4-2.228-.514-1.057-.685-2.257-.514-3.428.171-1.171.743-2.228 1.543-3.028.8-.8 1.857-1.371 3.028-1.543 1.171-.171 2.371 0 3.428.514 1.057.514 1.828 1.371 2.228 2.4.4 1.028.571 2.228.4 3.428-.171 1.171-.743 2.228-1.543 3.028-.8.8-1.857 1.371-3.028 1.543z" /></svg>
                        </a>
                        <a href="#" class="text-gray-700 hover:text-gray-900">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 mt-12 pt-8 text-center">
                <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                    <div class="flex-1 text-center md:text-left mb-4 md:mb-0">
                        <span class="font-medium">+1(123)123-1234</span>
                        <span class="mx-2">|</span>
                        <span>support@swiqatcrafts.com</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#465a58] text-white text-xs mt-8 py-4">
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
                <p>keshtiles E-commerce &copy; 2024. All Rights Reserved</p>
                                <div class="flex items-center space-x-4 mt-4 md:mt-0">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="h-5 filter grayscale hover:grayscale-0 transition duration-300 transform hover:scale-110">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="h-5 filter grayscale hover:grayscale-0 transition duration-300 transform hover:scale-110">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="h-5 filter grayscale hover:grayscale-0 transition duration-300 transform hover:scale-110">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/American_Express_logo_%282018%29.svg" alt="American Express" class="h-5 filter grayscale hover:grayscale-0 transition duration-300 transform hover:scale-110">
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

    <script src="//code.tidio.co/b84fs8bqjebbks4e3hqsv3y4sifadvfp.js" async></script>
</body>
</html>