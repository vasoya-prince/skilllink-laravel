<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Leave a Review</h1>

        <div class="bg-white p-6 rounded shadow">

            <p class="text-gray-700 mb-4">
                Booking with <strong>{{ $booking->worker->name }}</strong>
            </p>

            <form action="{{ route('customer.review.store', $booking->id) }}" method="POST">
                @csrf

                <!-- Rating -->
                <label class="font-semibold block mb-2">Rating (1 to 5)</label>
                <select name="rating" class="w-full border p-2 rounded mb-4" required>
                    <option value="">Select Rating</option>
                    <option value="1">★☆☆☆☆ (1)</option>
                    <option value="2">★★☆☆☆ (2)</option>
                    <option value="3">★★★☆☆ (3)</option>
                    <option value="4">★★★★☆ (4)</option>
                    <option value="5">★★★★★ (5)</option>
                </select>

                <!-- Comment -->
                <label class="font-semibold block mb-2">Comment (optional)</label>
                <textarea name="comment" class="w-full border p-2 rounded mb-4" rows="4"></textarea>

                <button class="px-6 py-2 bg-blue-600 text-white rounded">
                    Submit Review
                </button>
            </form>

        </div>

    </div>
</x-app-layout>
