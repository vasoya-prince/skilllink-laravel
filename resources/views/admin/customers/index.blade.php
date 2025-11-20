<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Customers</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full bg-white shadow rounded">
            <thead>
                <tr class="border-b">
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-left">City</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>
            @foreach($customers as $customer)
                <tr class="border-b">
                    <td class="p-3">{{ $customer->name }}</td>
                    <td class="p-3">{{ $customer->email }}</td>
                    <td class="p-3">{{ $customer->phone }}</td>
                    <td class="p-3">{{ $customer->city }}</td>

                    <td class="p-3 flex gap-2">

                        <a href="{{ route('admin.customers.show', $customer->id) }}"
                           class="px-3 py-1 bg-blue-600 text-white rounded">
                            View
                        </a>

                        <form action="{{ route('admin.customers.delete', $customer->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this customer?');">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
