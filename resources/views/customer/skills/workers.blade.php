<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">
            Workers Skilled in: {{ $skill->name }}
        </h1>

        @if($workers->count() == 0)
            <p class="text-gray-600">No workers available for this skill.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @foreach($workers as $worker)
                <div class="p-6 bg-white shadow rounded">

                    <h2 class="text-xl font-semibold">
                        {{ $worker->user->name }}
                    </h2>

                    <p class="text-gray-600">City: {{ $worker->user->city }}</p>
                    <p class="text-gray-600">Experience: {{ $worker->experience_years }} years</p>
                    <p class="text-gray-600">Rate: ₹{{ $worker->hourly_rate }}/hour</p>

                    <a href="#" class="mt-3 inline-block px-4 py-2 bg-blue-600 text-white rounded">
                        View Profile
                    </a>
                </div>
                @endforeach

            </div>
        @endif

    </div>
</x-app-layout>
