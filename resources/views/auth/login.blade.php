<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SkillLink</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Background Grid Pattern */
        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Smooth Input Transition */
        .input-transition {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-slate-900 text-slate-100 antialiased selection:bg-blue-500 selection:text-white relative overflow-hidden">

    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute inset-0 bg-grid-pattern opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-600/20 blur-[120px] rounded-full"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center px-4 relative z-10">

        <div class="w-full max-w-[420px] bg-slate-900/60 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-8 sm:p-10 animate-fade-in-up">

            <div class="text-center mb-10">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-6 group">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-blue-900/50 group-hover:scale-105 transition-transform">S</div>
                    <h1 class="text-2xl font-bold tracking-tight">Skill<span class="text-blue-500">Link</span></h1>
                </a>
                <h2 class="text-xl font-semibold text-white">Welcome back</h2>
                <p class="text-slate-400 text-sm mt-2">Please enter your details to sign in.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider ml-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                            </svg>
                        </div>
                        <input type="email" name="email" required autofocus placeholder="you@example.com"
                               class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 input-transition outline-none sm:text-sm">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider ml-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="password" name="password" required placeholder="••••••••"
                               class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 input-transition outline-none sm:text-sm">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="remember" 
                               class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-blue-600 focus:ring-blue-500/40 focus:ring-offset-0 cursor-pointer">
                        <span class="text-sm text-slate-400 group-hover:text-slate-300 transition-colors">Remember me</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-blue-400 hover:text-blue-300 transition-colors">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <button type="submit"
                        class="w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-900/40 transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                    Sign In
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 opacity-90">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>

            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-slate-700"></div>
                </div>
                <div class="relative flex justify-center text-xs uppercase">
                    <span class="bg-slate-900 px-2 text-slate-500 rounded-full">Or</span>
                </div>
            </div>

            <p class="text-center text-slate-400 text-sm">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-400 font-semibold hover:text-blue-300 hover:underline transition-all ml-1">
                    Create an account
                </a>
            </p>

        </div>
    </div>

</body>
</html>