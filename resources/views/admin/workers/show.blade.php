<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Worker Details</h1>

        @if(session('success'))
            <div class="p-2 bg-green-200 text-green-800 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 shadow rounded">
            <h2 class="text-xl font-semibold mb-2">{{ $worker->name }}</h2>

            <p><strong>Phone:</strong> {{ $worker->phone }}</p>
            <p><strong>City:</strong> {{ $worker->city }}</p>

            <hr class="my-4">

            <h3 class="text-lg font-semibold mb-2">Profile Info</h3>

            <p><strong>Experience:</strong> {{ $worker->workerProfile->experience_years }} years</p>
            <p><strong>Hourly Rate:</strong> ₹{{ $worker->workerProfile->hourly_rate }}</p>
            <p><strong>Status:</strong> {{ $worker->workerProfile->status }}</p>

            <hr class="my-4">

            <h3 class="text-lg font-semibold mb-2">Skills</h3>
            <ul class="list-disc ml-6">
                @foreach($worker->skills as $skill)
                    <li>{{ $skill->name }}</li>
                @endforeach
            </ul>

            <hr class="my-4">

            <div class="flex gap-4">

                <form action="{{ route('admin.workers.approve', $worker->id) }}" method="POST">
                    @csrf
                    <button class="px-4 py-2 bg-green-600 text-white rounded">
                        Approve
                    </button>
                </form>

                <form action="{{ route('admin.workers.reject', $worker->id) }}" method="POST">
                    @csrf
                    <button class="px-4 py-2 bg-red-600 text-white rounded">
                        Reject
                    </button>
                </form>

            </div>

        </div>

    </div>
</x-app-layout>
