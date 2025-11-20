<x-app-layout>
    <div class="p-6">

        <a href="{{ url()->previous() }}" class="text-blue-600 underline">&larr; Back</a>

        <div class="bg-white p-6 rounded shadow mt-4">

            <h1 class="text-3xl font-bold mb-3">
                {{ $worker->user->name }}
            </h1>

            <p class="text-gray-700 mb-2">
                <strong>City:</strong> {{ $worker->user->city }}
            </p>

            <p class="text-gray-700 mb-2">
                <strong>Experience:</strong> {{ $worker->experience_years }} years
            </p>

            <p class="text-gray-700 mb-2">
                <strong>Hourly Rate:</strong> ₹{{ $worker->hourly_rate }}
            </p>

            <p class="text-gray-700 mb-4">
                <strong>Bio:</strong> {{ $worker->bio }}
            </p>

            <h2 class="text-2xl font-semibold mb-2">Skills</h2>
            <ul class="list-disc ml-6 mb-4">
                @foreach($worker->skills as $skill)
                    <li>{{ $skill->name }}</li>
                @endforeach
            </ul>

            <hr class="my-6">

<h2 class="text-2xl font-semibold mb-4">Reviews</h2>

@if($worker->user->workerReviews->isEmpty())
    <p class="text-gray-600">No reviews yet.</p>
@else
    @foreach($worker->user->workerReviews as $review)
        <div class="mb-4 p-4 border rounded bg-gray-50">
            <p class="font-semibold">Rating: {{ $review->rating }} ★</p>
            <p class="text-gray-600">{{ $review->comment }}</p>
            <p class="text-xs text-gray-400">
                {{ $review->created_at->diffForHumans() }}
            </p>
        </div>
    @endforeach
@endif


            <a href="#" class="px-6 py-2 bg-green-600 text-white rounded text-lg">
                Book Worker
            </a>

        </div>

    </div>
</x-app-layout>
