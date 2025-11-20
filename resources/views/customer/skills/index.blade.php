<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Available Skills</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach($skills as $skill)
            <a href="{{ route('customer.skills.workers', $skill->id) }}"
               class="p-6 bg-white shadow rounded hover:bg-blue-50 transition">
                
                <h2 class="text-xl font-semibold">{{ $skill->name }}</h2>
                @if($skill->icon)
                    <p class="text-sm text-gray-500 mt-1">Icon: {{ $skill->icon }}</p>
                @endif

            </a>
            @endforeach

        </div>

    </div>
</x-app-layout>
