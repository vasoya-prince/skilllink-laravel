<x-app-layout>
    <div class="p-6">

        <a href="{{ route('admin.bookings.index') }}" class="text-blue-600 underline">&larr; Back</a>

        <h1 class="text-2xl font-bold mb-6">Booking Details</h1>

        <div class="bg-white p-6 rounded shadow">

            <h2 class="text-xl font-semibold mb-2">Booking #{{ $booking->id }}</h2>

            <p><strong>Status:</strong> <span class="capitalize">{{ $booking->status }}</span></p>
            <p><strong>Date:</strong> {{ $booking->date }}</p>
            <p><strong>Time:</strong> {{ $booking->time }}</p>
            <p><strong>Address:</strong> {{ $booking->address }}</p>

            <hr class="my-4">

            <h3 class="text-lg font-bold mb-2">Worker Details</h3>
            <p><strong>Name:</strong> {{ $booking->worker->name }}</p>
            <p><strong>Phone:</strong> {{ $booking->worker->phone }}</p>
            <p><strong>City:</strong> {{ $booking->worker->city }}</p>

            <hr class="my-4">

            <h3 class="text-lg font-bold mb-2">Customer Details</h3>
            <p><strong>Name:</strong> {{ $booking->customer->name }}</p>
            <p><strong>Phone:</strong> {{ $booking->customer->phone }}</p>
            <p><strong>City:</strong> {{ $booking->customer->city }}</p>

            <p class="text-gray-400 mt-4">
                Created at: {{ $booking->created_at->format('d M Y H:i') }}
            </p>
        </div>

    </div>
</x-app-layout>
