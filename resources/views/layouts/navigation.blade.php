<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">

    <!-- Main Navigation Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left Section -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">
                        SkillLink
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    @guest
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            Home
                        </x-nav-link>

                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            Login
                        </x-nav-link>

                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            Register
                        </x-nav-link>
                    @endguest


                    @auth

                        {{-- CUSTOMER MENU --}}
                        @if(auth()->user()->role === 'customer')

                            <x-nav-link :href="route('customer.dashboard')"
                                :active="request()->routeIs('customer.dashboard')">
                                Dashboard
                            </x-nav-link>

                            <x-nav-link :href="route('customer.skills')"
                                :active="request()->routeIs('customer.skills*')">
                                Browse Skills
                            </x-nav-link>

                            <x-nav-link :href="route('customer.bookings.index')"
                                :active="request()->routeIs('customer.bookings.*')">
                                My Bookings
                            </x-nav-link>

                        @endif

                        {{-- WORKER MENU --}}
                        @if(auth()->user()->role === 'worker')

                            <x-nav-link :href="route('worker.dashboard')"
                                :active="request()->routeIs('worker.dashboard')">
                                Dashboard
                            </x-nav-link>

                            <x-nav-link :href="route('worker.bookings.index')"
                                :active="request()->routeIs('worker.bookings.*')">
                                Bookings
                            </x-nav-link>

                            <x-nav-link :href="route('worker.profile.edit')"
                                :active="request()->routeIs('worker.profile.*')">
                                Edit Profile
                            </x-nav-link>

                            <x-nav-link :href="route('worker.skills.edit')"
                                :active="request()->routeIs('worker.skills.*')">
                                My Skills
                            </x-nav-link>

                        @endif

                        {{-- ADMIN MENU --}}
                        @if(auth()->user()->role === 'admin')

                            <x-nav-link :href="route('admin.dashboard')"
                                :active="request()->routeIs('admin.dashboard')">
                                Dashboard
                            </x-nav-link>

                            <x-nav-link :href="route('admin.skills.index')"
                                :active="request()->routeIs('admin.skills.*')">
                                Skills
                            </x-nav-link>

                            <x-nav-link :href="route('admin.workers.index')"
                                :active="request()->routeIs('admin.workers.*')">
                                Workers
                            </x-nav-link>

                            <x-nav-link :href="route('admin.customers.index')"
                                :active="request()->routeIs('admin.customers.*')">
                                Customers
                            </x-nav-link>

                            <x-nav-link :href="route('admin.bookings.index')"
                                :active="request()->routeIs('admin.bookings.*')">
                                Bookings
                            </x-nav-link>

                        @endif

                    @endauth
                </div>
            </div>

            <!-- Right Side / User -->
            <div class="hidden sm:flex sm:items-center">

                @auth
                    <x-dropdown align="right" width="48">

                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                                <div>{{ auth()->user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                        <path d="M5.516 7.548c..." />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                                </x-dropdown-link>
                            </form>
                        </x-slot>

                    </x-dropdown>
                @endauth

            </div>

        </div>
    </div>

</nav>
