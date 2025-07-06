@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">Message Details</h1>
        </div>
        <div class="p-6">
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-700">Subject: {{ $contact->subject }}</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="text-sm text-gray-500">Sender Name</p>
                    <p class="text-lg text-gray-900">{{ $contact->name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Sender Email</p>
                    <p class="text-lg text-gray-900">{{ $contact->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Received At</p>
                    <p class="text-lg text-gray-900">{{ $contact->created_at->format('F d, Y \a\t H:i') }}</p>
                </div>
            </div>

            <div class="border-t pt-6">
                <p class="text-sm text-gray-500 mb-2">Message</p>
                <div class="prose max-w-none text-gray-800">
                    {{ $contact->message }}
                </div>
            </div>

            <div class="mt-8 text-right">
                <a href="{{ route('admin.contacts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                    &larr; Back to All Messages
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
