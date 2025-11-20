<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">My Bookings</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($bookings->isEmpty())
            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-600">You have no bookings yet.</p>
            </div>
        @else
            <div class="space-y-4">

                @foreach($bookings as $b)
                <div class="bg-white p-4 rounded shadow">

                    <h2 class="text-xl font-semibold mb-2">
                        Worker: {{ $b->worker->name }}
                    </h2>

                    <p class="text-gray-600"><strong>Date:</strong> {{ $b->date }}</p>
                    <p class="text-gray-600"><strong>Time:</strong> {{ $b->time }}</p>
                    <p class="text-gray-600"><strong>Address:</strong> {{ $b->address }}</p>

                    <p class="text-gray-600 mt-1">
                        <strong>Status:</strong>
                        <span class="capitalize">{{ $b->status }}</span>
                    </p>

                    <!-- Cancel button -->
                    @if(in_array($b->status, ['pending', 'accepted']))
                        <form action="{{ route('customer.bookings.cancel', $b->id) }}"
                              method="POST"
                              class="mt-3"
                              onsubmit="return confirm('Cancel this booking?');">

                            @csrf

                            <button class="px-4 py-2 bg-red-600 text-white rounded">
                                Cancel Booking
                            </button>
                        </form>

                    @if($b->status === 'completed')
                        <a href="{{ route('customer.review.create', $b->id) }}"
                        class="inline-block mt-3 px-4 py-2 bg-yellow-500 text-white rounded">
                        Review Now
                        </a>
    
                    @endif

                </div>
                @endforeach

            </div>
        @endif

    </div>
</x-app-layout>
