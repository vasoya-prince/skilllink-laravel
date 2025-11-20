<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Workers List</h1>

        <table class="w-full bg-white shadow rounded">
            <thead>
                <tr class="border-b">
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-left">City</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($workers as $worker)
                <tr class="border-b">
                    <td class="p-3">{{ $worker->name }}</td>
                    <td class="p-3">{{ $worker->phone }}</td>
                    <td class="p-3">{{ $worker->city }}</td>
                    <td class="p-3 capitalize">
                        {{ $worker->workerProfile->status ?? 'pending' }}
                    </td>
                    <td class="p-3">
                        <a href="{{ route('admin.workers.show', $worker->id) }}"
                           class="px-3 py-1 bg-blue-600 text-white rounded">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-app-layout>
