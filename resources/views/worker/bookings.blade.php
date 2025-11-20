<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Bookings</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($bookings->isEmpty())
            <div class="p-4 bg-white shadow rounded">
                <p class="text-gray-600">No bookings found.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($bookings as $b)
                    <div class="bg-white shadow rounded p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Booking #{{ $b->id }}
                                </h2>

                                <p class="text-sm text-gray-600">
                                    <strong>Customer:</strong>
                                    {{ optional($b->customer)->name ?? '—' }}
                                </p>

                                <p class="text-sm text-gray-600">
                                    <strong>Contact:</strong>
                                    {{ optional($b->customer)->phone ?? '—' }}
                                </p>

                                <p class="text-sm text-gray-600">
                                    <strong>Date & Time:</strong> {{ $b->date }} at {{ \Carbon\Carbon::createFromFormat('H:i:s', $b->time ?? '00:00:00')->format('H:i') }}
                                </p>

                                <p class="text-sm text-gray-600">
                                    <strong>Address:</strong> {{ $b->address }}
                                </p>

                                <p class="text-sm text-gray-600">
                                    <strong>Status:</strong> <span class="capitalize">{{ $b->status }}</span>
                                </p>

                                @if($b->total_price)
                                    <p class="text-sm text-gray-600">
                                        <strong>Price:</strong> ₹{{ $b->total_price }}
                                    </p>
                                @endif
                            </div>

                            <!-- Actions -->
                            <div class="space-y-2 text-right">
                                @if($b->status === 'pending')
                                    <form action="{{ route('worker.bookings.accept', $b->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded">Accept</button>
                                    </form>

                                    <form action="{{ route('worker.bookings.reject', $b->id) }}" method="POST" onsubmit="return confirm('Reject this booking?');">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Reject</button>
                                    </form>

                                @elseif($b->status === 'accepted')
                                    <form action="{{ route('worker.bookings.complete', $b->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Mark Completed</button>
                                    </form>

                                    <form action="{{ route('worker.bookings.reject', $b->id) }}" method="POST" onsubmit="return confirm('Cancel this booking?');">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Cancel</button>
                                    </form>

                                @else
                                    <span class="text-sm text-gray-500">No actions available</span>
                                @endif

                                <div class="text-xs text-gray-400 mt-2">Requested: {{ $b->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
