<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

        @if(session('success'))
            <div class="p-3 bg-green-200 text-green-800 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('worker.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Name -->
                <div>
                    <label class="font-semibold">Full Name</label>
                    <input type="text" name="name" value="{{ $user->name }}"
                           class="w-full border p-2 rounded" required>
                </div>

                <!-- Phone -->
                <div>
                    <label class="font-semibold">Phone</label>
                    <input type="text" name="phone" value="{{ $user->phone }}"
                           class="w-full border p-2 rounded" required>
                </div>

                <!-- City -->
                <div>
                    <label class="font-semibold">City</label>
                    <input type="text" name="city" value="{{ $user->city }}"
                           class="w-full border p-2 rounded" required>
                </div>

                <!-- Experience -->
                <div>
                    <label class="font-semibold">Experience (Years)</label>
                    <input type="number" name="experience_years"
                           value="{{ $profile->experience_years }}"
                           class="w-full border p-2 rounded" required>
                </div>

                <!-- Rate -->
                <div>
                    <label class="font-semibold">Hourly Rate (₹)</label>
                    <input type="number" name="hourly_rate"
                           value="{{ $profile->hourly_rate }}"
                           class="w-full border p-2 rounded" required>
                </div>

                <!-- ID Proof -->
                <div>
                    <label class="font-semibold">ID Proof (Image/PDF)</label>
                    <input type="file" name="id_proof" class="w-full border p-2 rounded">

                    @if($profile->id_proof)
                        <p class="mt-2 text-sm text-gray-600">Uploaded: {{ $profile->id_proof }}</p>
                    @endif
                </div>

            </div>

            <!-- Bio -->
            <div class="mt-6">
                <label class="font-semibold">Bio</label>
                <textarea name="bio" rows="4" class="w-full border p-2 rounded">{{ $profile->bio }}</textarea>
            </div>

            <button class="mt-6 px-6 py-2 bg-blue-600 text-white rounded">
                Save Changes
            </button>

        </form>
    </div>
</x-app-layout>
