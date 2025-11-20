<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink — Hire Skilled Workers Easily</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Custom Grid Background for Hero */
        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Smooth fade-up animation */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Button Shine Effect */
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        .btn-shine::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        .btn-shine:hover::after {
            left: 100%;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 antialiased selection:bg-blue-500 selection:text-white">

    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-lg border-b border-slate-200 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <!-- CLICKABLE LOGO -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 cursor-pointer select-none">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">
                    S
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    Skill<span class="text-blue-600">Link</span>
                </h1>
            </a>

            <!-- MAIN NAV LINKS -->
            <div class="hidden md:flex items-center space-x-8 text-sm font-semibold text-slate-600">
                <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Home</a>
                <a href="#features" class="hover:text-blue-600 transition-colors">Features</a>
                <a href="{{ route('customer.skills') }}" class="hover:text-blue-600 transition-colors">
                    Find Workers
                </a>
                <a href="#about" class="hover:text-blue-600 transition-colors">About</a>
                <a href="#contact" class="hover:text-blue-600 transition-colors">Contact</a>
            </div>

            <!-- LOGIN / REGISTER BUTTONS -->
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900 transition">
                    Log in
                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2.5 bg-slate-900 text-white text-sm font-semibold rounded-full 
                          hover:bg-blue-600 transition-all duration-300 shadow-lg shadow-slate-900/20 
                          hover:shadow-blue-600/30 btn-shine">
                    Register Now
                </a>
            </div>

        </div>
    </div>
</nav>


    <section class="relative pt-48 pb-32 bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-blue-500/20 blur-[120px] rounded-full pointer-events-none"></div>
        
        <div class="max-w-5xl mx-auto text-center px-6 relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-900/50 border border-blue-700/50 text-blue-300 text-xs font-medium mb-8 fade-up">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                Now live in your city
            </div>

            <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold text-white leading-[1.1] tracking-tight mb-8 fade-up" style="animation-delay: 0.1s;">
                Expert help, <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">right at your doorstep.</span>
            </h1>

            <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto mb-10 leading-relaxed fade-up" style="animation-delay: 0.2s;">
                Connect with verified local professionals. From electricians to tailors, find the right skill for the right price, instantly.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4 fade-up" style="animation-delay: 0.3s;">
                <a href="{{ route('register') }}"
                   class="px-8 py-4 bg-blue-600 text-white text-base font-bold rounded-xl hover:bg-blue-500 transition-all duration-300 shadow-xl shadow-blue-900/50 btn-shine">
                   Find a Worker
                </a>

                <a href="{{ route('customer.skills') }}"
                   class="px-8 py-4 bg-white/5 backdrop-blur-sm border border-white/10 text-white text-base font-bold rounded-xl hover:bg-white/10 transition-all duration-300">
                   Explore Services
                </a>
            </div>
            
            <div class="mt-12 pt-8 border-t border-white/5 flex flex-col md:flex-row items-center justify-center gap-6 text-slate-500 text-sm fade-up" style="animation-delay: 0.4s;">
                <span>Trusted by 2,000+ homeowners</span>
                <div class="hidden md:block w-1 h-1 bg-slate-700 rounded-full"></div>
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full border-2 border-slate-900 bg-slate-700"></div>
                    <div class="w-8 h-8 rounded-full border-2 border-slate-900 bg-slate-600"></div>
                    <div class="w-8 h-8 rounded-full border-2 border-slate-900 bg-slate-500"></div>
                    <div class="w-8 h-8 rounded-full border-2 border-slate-900 bg-slate-400 flex items-center justify-center text-[10px] text-slate-900 font-bold">+2k</div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">The smarter way to hire</h2>
                <p class="text-slate-600 text-lg">We've removed the friction from finding reliable local help.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-white border border-slate-100 hover:border-blue-100 shadow-sm hover:shadow-xl hover:shadow-blue-900/5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                        🛡️
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Verified & Vetted</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Don't worry about strangers. Every worker on SkillLink undergoes a mandatory background and skill check.
                    </p>
                </div>

                <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-white border border-slate-100 hover:border-blue-100 shadow-sm hover:shadow-xl hover:shadow-blue-900/5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                        ⚡
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Fast Booking</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Need help now? Our real-time availability system lets you book a professional in less than 60 seconds.
                    </p>
                </div>

                <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-white border border-slate-100 hover:border-blue-100 shadow-sm hover:shadow-xl hover:shadow-blue-900/5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-violet-500 text-white flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                        💎
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Fair Pricing</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Standardized rates based on the job type. No haggling, no hidden fees, just honest work for honest pay.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="skills" class="py-24 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Popular Services</h2>
                    <p class="text-slate-600">Most requested skills by neighbors near you.</p>
                </div>
                <a href="{{ route('customer.skills') }}" class="text-blue-600 font-bold hover:text-blue-700 flex items-center gap-1 group">
                    View all categories 
                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-1 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="h-full p-6 border border-slate-100 rounded-xl hover:border-blue-200 transition-colors">
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Electric Repairs</h3>
                        <p class="text-sm text-slate-500 mb-4">Wiring, installations, appliance fixes.</p>
                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 w-3/4 rounded-full"></div>
                        </div>
                        <p class="text-xs text-slate-400 mt-2">Very High Demand</p>
                    </div>
                </div>

                <div class="bg-white p-1 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="h-full p-6 border border-slate-100 rounded-xl hover:border-emerald-200 transition-colors">
                         <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center text-emerald-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Solar Cleaning</h3>
                        <p class="text-sm text-slate-500 mb-4">Eco-friendly panel maintenance.</p>
                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-500 w-1/2 rounded-full"></div>
                        </div>
                        <p class="text-xs text-slate-400 mt-2">High Demand</p>
                    </div>
                </div>

                <div class="bg-white p-1 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="h-full p-6 border border-slate-100 rounded-xl hover:border-violet-200 transition-colors">
                         <div class="w-12 h-12 bg-violet-50 rounded-lg flex items-center justify-center text-violet-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Tailoring</h3>
                        <p class="text-sm text-slate-500 mb-4">Custom fits and repairs.</p>
                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-violet-500 w-2/3 rounded-full"></div>
                        </div>
                        <p class="text-xs text-slate-400 mt-2">Moderate Demand</p>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                 <p class="text-slate-500 mb-6">Looking for something else?</p>
                 <a href="{{ route('customer.skills') }}"
                   class="px-8 py-3 bg-white text-slate-900 border border-slate-200 font-bold rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all shadow-sm">
                   Browse All Categories
                </a>
            </div>
        </div>
    </section>

    <footer id="contact" class="bg-slate-900 text-slate-400 py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold text-white mb-2">SkillLink</h2>
                <p class="text-sm">Connecting communities, one skill at a time.</p>
            </div>
            
            <div class="flex space-x-6 text-sm font-medium">
                <a href="#" class="hover:text-white transition">Privacy</a>
                <a href="#" class="hover:text-white transition">Terms</a>
                <a href="#" class="hover:text-white transition">Support</a>
            </div>

            <div class="text-center md:text-right text-xs text-slate-600">
                <p>&copy; {{ date('Y') }} SkillLink Project.</p>
                <p>MScIT Submission.</p>
            </div>
        </div>
    </footer>

</body>
</html>