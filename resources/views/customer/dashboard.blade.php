<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Customer Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-lg">Total Bookings</h2>
                <p class="text-2xl font-bold">{{ $bookings }}</p>
            </div>

            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-lg">Completed Bookings</h2>
                <p class="text-2xl font-bold">{{ $completed }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
