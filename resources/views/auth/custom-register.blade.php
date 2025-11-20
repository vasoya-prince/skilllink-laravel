<x-guest-layout>

    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow mt-10">

        <h1 class="text-2xl font-bold mb-4 text-center">Create an Account</h1>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <!-- Select Role -->
            <label class="font-semibold block mb-2" for="role">Register As</label>
            <select name="role" id="role" class="w-full border p-2 rounded mb-4" required aria-label="Select your role">
                <option value="">Select...</option>
                <option value="customer">Customer</option>
                <option value="worker">Worker</option>
            </select>

            <!-- Common Fields -->
            <label class="font-semibold block mb-2" for="name">Name</label>
            <input type="text" name="name" id="name" class="w-full border p-2 rounded mb-4" required placeholder="Enter your name" aria-label="Name">

            <label class="font-semibold block mb-2" for="email">Email</label>
            <input type="email" name="email" id="email" class="w-full border p-2 rounded mb-4" required placeholder="Enter your email" aria-label="Email">

            <label class="font-semibold block mb-2" for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="w-full border p-2 rounded mb-4" required placeholder="Enter your phone number" aria-label="Phone">

            <label class="font-semibold block mb-2" for="city">City</label>
            <input type="text" name="city" id="city" class="w-full border p-2 rounded mb-4" required placeholder="Enter your city" aria-label="City">

            <!-- Worker Fields (hidden by default) -->
            <div id="worker-fields" class="hidden">

                <label class="font-semibold block mb-2" for="experience_years">Experience (Years)</label>
                <input type="number" name="experience_years" id="experience_years" class="w-full border p-2 rounded mb-4" placeholder="Enter your years of experience" aria-label="Experience Years">

                <label class="font-semibold block mb-2" for="hourly_rate">Hourly Rate</label>
                <input type="number" name="hourly_rate" id="hourly_rate" class="w-full border p-2 rounded mb-4" placeholder="Enter your hourly rate" aria-label="Hourly Rate">

                <label class="font-semibold block mb-2" for="bio">Bio</label>
                <textarea name="bio" id="bio" class="w-full border p-2 rounded mb-4" placeholder="Enter your bio" aria-label="Bio"></textarea>

            </div>

            <!-- Password -->
            <label class="font-semibold block mb-2" for="password">Password</label>
            <input type="password" name="password" id="password" class="w-full border p-2 rounded mb-4" required placeholder="Enter your password" aria-label="Password">

            <label class="font-semibold block mb-2" for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border p-2 rounded mb-4" required placeholder="Confirm your password" aria-label="Confirm Password">

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded mt-4 hover:bg-blue-700">
                Register
            </button>
        </form>

    </div>

    <!-- Show/Hide Worker Fields -->
    <script>
        document.getElementById('role').addEventListener('change', function() {
            const workerFields = document.getElementById('worker-fields');

            if (this.value === 'worker') {
                workerFields.classList.remove('hidden');
            } else {
                workerFields.classList.add('hidden');
            }
        });
    </script>

</x-guest-layout>