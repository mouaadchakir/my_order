@extends('layouts.app')

@section('content')
<div class="bg-white">
    <!-- Hero Section -->
    <div class="relative bg-gray-800 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://images.pexels.com/photos/1889733/pexels-photo-1889733.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="w-full h-full object-center object-cover">
        </div>
        <div aria-hidden="true" class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
        <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">
            <h2 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl">Get in Touch</h2>
            <p class="mt-4 text-xl text-white">We'd love to hear from you. Whether you have a question about our products, our story, or anything else, our team is ready to answer all your questions.</p>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16">
                <!-- Contact Information -->
                <div class="mb-12 md:mb-0">
                    <h3 class="text-2xl font-bold text-gray-900">Contact Information</h3>
                    <p class="mt-3 text-lg text-gray-600">Our workshop is located in the heart of Morocco's artisan capital. Feel free to reach out or visit us.</p>
                    <div class="mt-8 space-y-6 text-gray-700">
                        <div class="flex items-start">
                            <svg class="flex-shrink-0 h-6 w-6 text-[#2c5b56]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="ml-3">123 Artisan Quarter, Marrakech, Morocco</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="flex-shrink-0 h-6 w-6 text-[#2c5b56]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="ml-3">contact@moroccancrafts.com</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="flex-shrink-0 h-6 w-6 text-[#2c5b56]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="ml-3">+212 5 24 12 34 56</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white shadow-lg rounded-lg p-8">
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                            <p class="font-bold">Success!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="sr-only">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-[#2c5b56] focus:border-[#2c5b56] border-gray-300 rounded-md @error('name') border-red-500 @enderror" placeholder="Full Name">
                            @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="email" class="sr-only">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-[#2c5b56] focus:border-[#2c5b56] border-gray-300 rounded-md @error('email') border-red-500 @enderror" placeholder="Email Address">
                            @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-[#2c5b56] focus:border-[#2c5b56] border-gray-300 rounded-md @error('subject') border-red-500 @enderror" placeholder="Subject">
                            @error('subject')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="message" class="sr-only">Message</label>
                            <textarea id="message" name="message" rows="5" required class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-[#2c5b56] focus:border-[#2c5b56] border-gray-300 rounded-md @error('message') border-red-500 @enderror" placeholder="Message">{{ old('message') }}</textarea>
                            @error('message')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-[#2c5b56] hover:bg-[#1e3c38] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2c5b56] transition-colors">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <h3 class="text-2xl font-bold text-center text-gray-900 mb-8">Our Location</h3>
            <div class="aspect-w-16 aspect-h-9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d217897.6204732738!2d-8.103216838334816!3d31.63474853709388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee8d96175e51%3A0x5950b6534f876b5!2sMarrakesh%2C%20Morocco!5e0!3m2!1sen!2sus!4v1657815349864!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
