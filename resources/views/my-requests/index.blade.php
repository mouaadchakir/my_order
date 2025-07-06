<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Made-to-Measure Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($requests->isEmpty())
                        <p>You have not made any requests yet.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Product Name</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach($requests as $request)
                                        <tr class="border-b">
                                            <td class="py-3 px-4">{{ $request->product_name }}</td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 font-semibold leading-tight text-xs rounded-full 
                                                    @switch($request->status)
                                                        @case('New') bg-blue-200 text-blue-800 @break
                                                        @case('In Progress') bg-yellow-200 text-yellow-800 @break
                                                        @case('Completed') bg-green-200 text-green-800 @break
                                                        @case('Cancelled') bg-red-200 text-red-800 @break
                                                    @endswitch">
                                                    {{ $request->status }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">{{ $request->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $requests->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
