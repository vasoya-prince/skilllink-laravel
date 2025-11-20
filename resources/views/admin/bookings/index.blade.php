<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">All Bookings</h1>

        <!-- Filters -->
        <form method="GET" class="mb-4">
            <select name="status" class="border p-2 rounded">
                <option value="">All Status</option>
                <option value="pending" {{ $status=='pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ $status=='accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="completed" {{ $status=='completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $status=='cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <button class="px-4 py-2 bg-blue-600 text-white rounded ml-2">Filter</button>
        </form>

        @if($bookings->isEmpty())
            <div class="p-4 bg-white rounded shadow">
                <p class="text-gray-600">No bookings found.</p>
            </div>
        @else
            <div class="space-y-4">

                @foreach($bookings as $b)
                <div class="bg-white p-4 rounded shadow">

                    <div class="flex justify-between">
                        <div>
                            <p><strong>ID:</strong> {{ $b->id }}</p>
                            <p><strong>Worker:</strong> {{ $b->worker->name }}</p>
                            <p><strong>Customer:</strong> {{ $b->customer->name }}</p>
                            <p><strong>Date:</strong> {{ $b->date }}</p>
                            <p><strong>Time:</strong> {{ $b->time }}</p>
                            <p><strong>Status:</strong> <span class="capitalize">{{ $b->status }}</span></p>
                        </div>

                        <a href="{{ route('admin.bookings.show', $b->id) }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded h-fit">
                            View
                        </a>
                    </div>

                </div>
                @endforeach

            </div>
        @endif

    </div>
</x-app-layout>
