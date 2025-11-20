<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Skills</h1>

        <a href="{{ route('admin.skills.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded">Add Skill</a>

        @if(session('success'))
            <div class="mt-4 p-2 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-6 bg-white shadow rounded">
            <thead>
                <tr class="border-b">
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Icon</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                <tr class="border-b">
                    <td class="p-3">{{ $skill->id }}</td>
                    <td class="p-3">{{ $skill->name }}</td>
                    <td class="p-3">{{ $skill->icon }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.skills.edit', $skill->id) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

                        <form action="{{ route('admin.skills.delete', $skill->id) }}"
                              method="POST" class="inline-block"
                              onsubmit="return confirm('Delete this skill?');">
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