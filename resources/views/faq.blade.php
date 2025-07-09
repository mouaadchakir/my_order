@extends('layouts.app')

@section('content')
    {{-- Page Header --}}
    <div class="bg-[#F8F5F2]">
        <div class="container mx-auto px-4 py-12 text-center">
            <h1 class="text-4xl font-bold" style="font-family: serif;">Frequently Asked Questions</h1>
            <p class="text-gray-600 mt-2">Home / FAQ</p>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                {{-- FAQ Item 1 --}}
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">What is Zellige?</h3>
                    <p class="text-gray-600 leading-relaxed">Zellige (or Zellij) is a style of mosaic tilework made from individually hand-chiseled tile pieces set into a plaster base. The art form is native to Morocco and is characterized by its vibrant colors, intricate geometric patterns, and unique, irregular surface finish.</p>
                </div>

                {{-- FAQ Item 2 --}}
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">How are your tiles made?</h3>
                    <p class="text-gray-600 leading-relaxed">Our tiles are handmade by skilled artisans in Fez, Morocco, using traditional methods passed down through generations. The process involves mixing natural clay, shaping it by hand, sun-drying, and then firing it in a kiln. Each tile is then hand-glazed and cut into its final shape, resulting in unique variations in color and texture.</p>
                </div>

                {{-- FAQ Item 3 --}}
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Can I order custom designs?</h3>
                    <p class="text-gray-600 leading-relaxed">Absolutely! We specialize in custom orders. You can specify the colors, shapes, and sizes you need for your project. Please visit our <a href="{{ route('made-to-measure.create') }}" class="text-blue-600 hover:underline">Made-to-Measure</a> page to submit your request, and our design team will work with you to bring your vision to life.</p>
                </div>

                {{-- FAQ Item 4 --}}
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">What is the lead time for orders?</h3>
                    <p class="text-gray-600 leading-relaxed">Lead times vary depending on the size and complexity of the order. For in-stock items, we typically ship within 3-5 business days. For custom orders, the lead time can range from 4 to 8 weeks, as each tile is made to order. We will provide a more accurate estimate when you place your order.</p>
                </div>

                {{-- FAQ Item 5 --}}
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Do you ship internationally?</h3>
                    <p class="text-gray-600 leading-relaxed">Yes, we ship worldwide. Shipping costs and delivery times will vary based on your location. All shipping options and costs will be calculated at checkout.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
