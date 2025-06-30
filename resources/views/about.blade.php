@extends('layouts.app')

@section('content')
    {{-- Page Header --}}
    <div class="bg-[#F8F5F2]">
        <div class="container mx-auto px-4 py-12 text-center">
            <h1 class="text-4xl font-bold" style="font-family: serif;">About Us</h1>
            <p class="text-gray-600 mt-2">Home / About Us</p>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-col md:flex-row items-center gap-12 mb-16">
                <div class="md:w-1/2 text-gray-700">
                    <h2 class="text-3xl font-bold mb-4" style="font-family: serif;">Our Story</h2>
                    <p class="mb-4 leading-relaxed">Welcome to KeshTiles, your portal to the vibrant world of Moroccan tile artistry. Our journey began with a deep passion for the rich history and intricate craftsmanship of Zellige and a desire to share its beauty with the world.</p>
                    <p class="leading-relaxed">Our shop offers you the opportunity to create your own design with colors of YOUR CHOICE that harmonize with the decor of your place. We work directly with skilled artisans in Fez, the heart of Moroccan tile production, ensuring that every piece we offer is authentic, of the highest quality, and ethically sourced. We also offer a wholesale program with great discounts. Please do not hesitate to connect us for more information. We are always available to answer.</p>
                </div>
                <div class="md:w-1/2">
                    <img src="https://i.imgur.com/eAn3xUl.jpg" alt="Artisan working on tiles" class="w-full">
                </div>
            </div>

            <div class="text-center">
                 <h2 class="text-3xl font-bold text-gray-800 mb-4" style="font-family: serif;">Discover how Moroccan Zellige is made.</h2>
                <p class="max-w-3xl mx-auto text-gray-600 mb-8">Moroccan zellige is a traditional mosaic tilework made from clay and crafted through a meticulous artisanal process. It begins with natural clay, usually sourced from Fez, which is soaked in water, kneaded by hand or foot, and shaped into the tiles. These are sun-dried, then fired in kilns to harden.</p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12">
                    <img src="https://i.imgur.com/gJ5R4j8.jpg" alt="Zellige making process 1" class="w-full h-full object-cover">
                    <img src="https://i.imgur.com/O3G2Y2p.jpg" alt="Zellige making process 2" class="w-full h-full object-cover">
                    <img src="https://i.imgur.com/YqM0i6A.jpg" alt="Zellige making process 3" class="w-full h-full object-cover">
                    <img src="https://i.imgur.com/d2L8a3a.jpg" alt="Zellige making process 4" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
@endsection
