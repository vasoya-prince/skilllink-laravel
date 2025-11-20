<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">Select Your Skills</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('worker.skills.update') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                @foreach($skills as $skill)
                    <label class="flex items-center gap-2 p-3 border rounded cursor-pointer">

                        <input
                            type="checkbox"
                            name="skills[]"
                            value="{{ $skill->id }}"
                            {{ in_array($skill->id, $selectedSkills) ? 'checked' : '' }}
                        >

                        <span class="text-lg">{{ $skill->name }}</span>

                    </label>
                @endforeach

            </div>

            <button class="mt-6 px-6 py-2 bg-blue-600 text-white rounded">
                Save Skills
            </button>

        </form>

    </div>
</x-app-layout>
