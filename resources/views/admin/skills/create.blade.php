<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Add Skill</h1>

        <form action="{{ route('admin.skills.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <label class="block mb-2 font-semibold">Skill Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>

            <label class="block mt-4 mb-2 font-semibold">Icon (optional)</label>
            <input type="text" name="icon" class="w-full border p-2 rounded">

            <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
                Save Skill
            </button>
        </form>
    </div>
</x-app-layout>
