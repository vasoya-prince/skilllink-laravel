<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Worker Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-lg">Pending Jobs</h2>
                <p class="text-2xl font-bold">{{ $pending }}</p>
            </div>

            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-lg">Accepted Jobs</h2>
                <p class="text-2xl font-bold">{{ $accepted }}</p>
            </div>

            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-lg">Completed Jobs</h2>
                <p class="text-2xl font-bold">{{ $completed }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
