<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started — SkillLink</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Background Grid Pattern */
        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Autofill fix for dark theme */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px rgba(30, 41, 59, 0.8) inset !important;
            -webkit-text-fill-color: white !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Role Card Styles */
        .role-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .role-selected {
            background-color: rgba(37, 99, 235, 0.15);
            border-color: #3b82f6;
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.2);
        }
        .role-selected .icon-box { background-color: #3b82f6; color: white; }
        .role-selected .role-title { color: #60a5fa; }
    </style>
</head>

<body class="bg-slate-900 text-slate-100 antialiased relative overflow-x-hidden">

    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute inset-0 bg-grid-pattern opacity-20"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-[600px] h-[600px] bg-blue-600/20 blur-[120px] rounded-full"></div>
        </div>
    </div>

    <main class="min-h-screen flex items-center justify-center p-4 sm:p-6 relative z-10">
        
        <div class="w-full max-w-2xl bg-slate-900/80 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-8 sm:p-10 animate-fade-in-up">
            
            <div class="text-center mb-8">
                <div class="inline-flex items-center gap-2 mb-4">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-blue-900/50">S</div>
                    <h1 class="text-2xl font-bold tracking-tight">Skill<span class="text-blue-500">Link</span></h1>
                </div>
                <h2 class="text-xl font-bold text-white">Create your account</h2>
                <p class="text-slate-400 text-sm mt-2">Join our community of skilled professionals.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-200 text-sm">
                    <strong class="block font-semibold text-red-400 mb-1">Please correct the errors:</strong>
                    <ul class="list-disc pl-4 space-y-1 opacity-80">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-6" novalidate>
                @csrf

                <div>
                    <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider mb-3 block">I am registering as...</label>
                    <input type="hidden" name="role" id="roleInput" value="{{ old('role', 'customer') }}">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div id="cardCustomer" class="role-card cursor-pointer relative p-4 rounded-xl bg-slate-800/50 border border-slate-700 hover:border-slate-500 group">
                            <div class="flex items-center gap-4">
                                <div class="icon-box w-12 h-12 rounded-lg bg-slate-700 text-slate-300 flex items-center justify-center transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                </div>
                                <div>
                                    <div class="role-title font-bold text-slate-200 group-hover:text-white transition-colors">Customer</div>
                                    <div class="text-xs text-slate-500">I want to hire talent</div>
                                </div>
                            </div>
                            <div class="absolute top-4 right-4 opacity-0 transition-opacity check-icon text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>

                        <div id="cardWorker" class="role-card cursor-pointer relative p-4 rounded-xl bg-slate-800/50 border border-slate-700 hover:border-slate-500 group">
                            <div class="flex items-center gap-4">
                                <div class="icon-box w-12 h-12 rounded-lg bg-slate-700 text-slate-300 flex items-center justify-center transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                </div>
                                <div>
                                    <div class="role-title font-bold text-slate-200 group-hover:text-white transition-colors">Professional</div>
                                    <div class="text-xs text-slate-500">I want to find work</div>
                                </div>
                            </div>
                            <div class="absolute top-4 right-4 opacity-0 transition-opacity check-icon text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider ml-1">Full Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-slate-500 pointer-events-none">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        </span>
                        <input name="name" value="{{ old('name') }}" required type="text" placeholder="John Doe"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all shadow-sm">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider ml-1">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-slate-500 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </span>
                        <input name="email" value="{{ old('email') }}" required type="email" placeholder="you@example.com"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all shadow-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider ml-1">Phone</label>
                        <div class="relative">
                             <span class="absolute inset-y-0 left-3 flex items-center text-slate-500 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </span>
                            <input name="phone" value="{{ old('phone') }}" type="tel" maxlength="15" placeholder="98765..."
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all shadow-sm">
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider ml-1">City</label>
                        <div class="relative">
                             <span class="absolute inset-y-0 left-3 flex items-center text-slate-500 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </span>
                            <input name="city" value="{{ old('city') }}" type="text" placeholder="New York"
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all shadow-sm">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider ml-1">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-slate-500 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            </span>
                            <input name="password" required type="password" id="passwordInput" placeholder="••••••••"
                                class="w-full pl-10 pr-10 py-3 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all shadow-sm">
                             <button type="button" id="passToggle" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider ml-1">Confirm</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-slate-500 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            <input name="password_confirmation" required type="password" placeholder="••••••••"
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all shadow-sm">
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold rounded-xl shadow-lg shadow-blue-900/40 transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2 mt-2">
                    Get Started
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 opacity-90">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div class="text-center pt-2">
                     <p class="text-slate-400 text-sm">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-blue-400 font-semibold hover:text-blue-300 hover:underline transition-all ml-1">
                            Log in
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const roleInput = document.getElementById('roleInput');
            const cardCustomer = document.getElementById('cardCustomer');
            const cardWorker = document.getElementById('cardWorker');

            function updateRoleUI(selectedRole) {
                roleInput.value = selectedRole;
                
                // Update Card Visuals
                [cardCustomer, cardWorker].forEach(card => {
                    card.classList.remove('role-selected');
                    card.querySelector('.check-icon').style.opacity = '0';
                });
                const activeCard = selectedRole === 'worker' ? cardWorker : cardCustomer;
                activeCard.classList.add('role-selected');
                activeCard.querySelector('.check-icon').style.opacity = '1';
            }

            cardCustomer.addEventListener('click', () => updateRoleUI('customer'));
            cardWorker.addEventListener('click', () => updateRoleUI('worker'));
            
            // Initialize state
            updateRoleUI(roleInput.value || 'customer');

            // Password Toggle
            const passToggle = document.getElementById('passToggle');
            const passwordInput = document.getElementById('passwordInput');
            passToggle.addEventListener('click', () => {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passToggle.classList.add('text-blue-400');
                } else {
                    passwordInput.type = 'password';
                    passToggle.classList.remove('text-blue-400');
                }
            });
        });
    </script>
</body>
</html>