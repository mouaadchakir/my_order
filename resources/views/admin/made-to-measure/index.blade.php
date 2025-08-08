@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Made to Measure Requests</h1>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if($requests->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
            <p class="font-bold">No Requests Found</p>
            <p>There are currently no made-to-measure requests to display.</p>
        </div>
    @else
        <div class="mb-4 p-4 bg-gray-100 rounded-lg">
            <form action="{{ route('admin.requests.index') }}" method="GET" class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                <div class="flex-grow mb-2 sm:mb-0">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" name="search" id="search" placeholder="Search by name or email..." value="{{ request('search') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-2 sm:mb-0">
                    <label for="status" class="sr-only">Status</label>
                    <select name="status" id="status" class="w-full sm:w-auto px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Statuses</option>
                        <option value="New" {{ request('status') == 'New' ? 'selected' : '' }}>New</option>
                        <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Filter</button>
            </form>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Customer</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Product</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Dimensions (cm)</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Attachment</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-semibold">{{ $request->name }}</p>
                                <p class="text-gray-600 whitespace-no-wrap">{{ $request->email }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $request->product->name ?? $request->product_name ?? 'N/A' }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $request->width }} x {{ $request->length }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $request->created_at->format('M d, Y') }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @php
                                    $statusClass = '';
                                    switch ($request->status) {
                                        case 'New':
                                            $statusClass = 'bg-green-200 text-green-800';
                                            break;
                                        case 'In Progress':
                                            $statusClass = 'bg-blue-200 text-blue-800';
                                            break;
                                        case 'Completed':
                                            $statusClass = 'bg-gray-400 text-gray-800';
                                            break;
                                        case 'Cancelled':
                                            $statusClass = 'bg-red-200 text-red-800';
                                            break;
                                        default:
                                            $statusClass = 'bg-gray-200 text-gray-800';
                                    }
                                @endphp
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight {{ $statusClass }} rounded-full">
                                    <span class="relative">{{ $request->status }}</span>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if($request->file_path)
                                    <a href="{{ asset('storage/' . $request->file_path) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">
                                        Download File
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('admin.requests.show', $request->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold whitespace-nowrap">View Details</a>
                                    <form action="{{ route('admin.requests.update-status', $request->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="flex items-center">
                                            <select name="status" class="form-select appearance-none block w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                                <option value="New" @if($request->status == 'New') selected @endif>New</option>
                                                <option value="In Progress" @if($request->status == 'In Progress') selected @endif>In Progress</option>
                                                <option value="Completed" @if($request->status == 'Completed') selected @endif>Completed</option>
                                                <option value="Cancelled" @if($request->status == 'Cancelled') selected @endif>Cancelled</option>
                                            </select>
                                            <button type="submit" class="ml-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-1 px-3 rounded text-xs">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8 text-right">
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                &larr; Back to Admin Dashboard
            </a>
        </div>

        <div class="mt-6">
            {{ $requests->links() }}
        </div>
    @endif
</div>
@endsection
