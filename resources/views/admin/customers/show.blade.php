<x-app-layout>
    <div class="p-6">

        <a href="{{ route('admin.customers.index') }}" class="text-blue-600 underline">&larr; Back</a>

        <h1 class="text-2xl font-bold mt-4">Customer Details</h1>

        <div class="bg-white p-6 rounded shadow mt-4">
            <p><strong>Name:</strong> {{ $customer->name }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p><strong>City:</strong> {{ $customer->city }}</p>
        </div>

        <h2 class="text-2xl font-semibold mt-8 mb-4">Customer Bookings</h2>

        @if($bookings->isEmpty())
            <p class="text-gray-600">No bookings found.</p>
        @else
            <div class="space-y-4">
                @foreach($bookings as $b)
                <div class="bg-white p-4 rounded shadow">

                    <p><strong>Booking ID:</strong> {{ $b->id }}</p>
                    <p><strong>Worker:</strong> {{ $b->worker->name }}</p>
                    <p><strong>Date:</strong> {{ $b->date }}</p>
                    <p><strong>Time:</strong> {{ $b->time }}</p>
                    <p><strong>Address:</strong> {{ $b->address }}</p>

                    <p>
                        <strong>Status:</strong>
                        <span class="capitalize">{{ $b->status }}</span>
                    </p>

                    <p><strong>Created At:</strong> {{ $b->created_at->format('d M Y H:i') }}</p>

                </div>
                @endforeach
            </div>
        @endif

    </div>
</x-app-layout>
