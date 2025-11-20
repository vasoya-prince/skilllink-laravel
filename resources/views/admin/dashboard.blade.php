<x-app-layout>
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="bg-white shadow rounded p-6 text-center hover:shadow-lg transition">
            <p class="text-gray-500">Workers</p>
            <p class="text-3xl font-bold">{{ $workers }}</p>
        </div>

        <div class="bg-white shadow rounded p-6 text-center hover:shadow-lg transition">
            <p class="text-gray-500">Customers</p>
            <p class="text-3xl font-bold">{{ $customers }}</p>
        </div>

        <div class="bg-white shadow rounded p-6 text-center hover:shadow-lg transition">
            <p class="text-gray-500">Skills</p>
            <p class="text-3xl font-bold">{{ $skills }}</p>
        </div>

        <div class="bg-white shadow rounded p-6 text-center hover:shadow-lg transition">
            <p class="text-gray-500">Bookings</p>
            <p class="text-3xl font-bold">{{ $bookings }}</p>
        </div>

    </div>
</x-app-layout>
