<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">
            Book: {{ $worker->name }}
        </h1>

        <div class="bg-white p-6 rounded shadow">

            <h2 class="text-xl font-semibold mb-3">
                ₹{{ $worker->workerProfile->hourly_rate }} per hour
            </h2>

            <form action="{{ route('customer.book.store', $worker->id) }}" method="POST">
                @csrf

                <label class="block font-semibold mt-4">Select Date</label>
                <input type="date" name="date" class="w-full border p-2 rounded" required>

                <label class="block font-semibold mt-4">Select Time</label>
                <input type="time" name="time" class="w-full border p-2 rounded" required>

                <label class="block font-semibold mt-4">Service Address</label>
                <textarea name="address" rows="3" class="w-full border p-2 rounded" required></textarea>

                <button class="mt-4 px-6 py-2 bg-green-600 text-white rounded">
                    Confirm Booking
                </button>
            </form>

        </div>

    </div>
</x-app-layout>
