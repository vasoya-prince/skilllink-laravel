{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Get Started — SkillLink</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
      body { font-family: 'Plus Jakarta Sans', sans-serif; }
      /* subtle fade-in for the card */
      .fade-in-up { transform: translateY(10px); opacity: 0; animation: fadeUp .55s cubic-bezier(.16,1,.3,1) forwards; }
      @keyframes fadeUp { to { transform: translateY(0); opacity: 1; } }
      /* active role card */
      .role-active { border-color: rgba(59,130,246,0.9) !important; box-shadow: 0 6px 20px rgba(59,130,246,0.12); background: linear-gradient(180deg, rgba(59,130,246,0.06), rgba(59,130,246,0.02)); }
    </style>
</head>
<body class="bg-[#0f1724] text-slate-100">

  <main class="min-h-screen flex items-center justify-center p-6">
    <section class="w-full max-w-2xl">
      <div class="relative">
        <!-- blurred background circle -->
        <div aria-hidden class="absolute -top-16 -right-16 w-72 h-72 bg-gradient-to-tr from-blue-600 to-emerald-400 opacity-10 rounded-full blur-3xl"></div>

        <div class="mx-auto bg-gradient-to-b from-white/6 to-white/3 border border-white/6 rounded-3xl p-8 sm:p-10 shadow-2xl fade-in-up">
          <!-- header -->
          <div class="flex flex-col items-center text-center mb-6">
            <div class="flex items-center gap-3">
              <div class="w-11 h-11 rounded-lg bg-blue-500 flex items-center justify-center text-white font-bold text-lg shadow-md">S</div>
              <h1 class="text-2xl font-extrabold tracking-tight">Skill<span class="text-blue-400">Link</span></h1>
            </div>
            <p class="mt-3 text-slate-300 max-w-xl">Create your account — join our community of skilled professionals or find trusted local help.</p>
          </div>

          {{-- Display validation errors --}}
          @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-900/40 border border-red-700 p-3 text-sm text-red-100">
              <strong class="block font-semibold">Please fix the following</strong>
              <ul class="mt-2 list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('register') }}" class="space-y-6" novalidate>
            @csrf

            <!-- Role selector -->
            <div>
              <label class="block text-xs font-semibold text-slate-300 mb-2">I am a…</label>

              <input type="hidden" name="role" id="roleInput" value="{{ old('role', 'customer') }}">

              <div class="grid grid-cols-2 gap-4">
                <button type="button" id="cardCustomer"
                        aria-pressed="{{ old('role', 'customer') === 'customer' ? 'true' : 'false' }}"
                        class="role-card inline-flex flex-col items-start p-4 rounded-2xl border border-white/8 bg-white/3 transition focus:outline-none">
                  <div class="flex items-center gap-3">
                    <div class="p-2 rounded-md bg-blue-600/10 text-blue-400">
                      <!-- user icon -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A9 9 0 1118.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div class="text-left">
                      <div class="text-sm font-semibold">Customer</div>
                      <div class="text-xs text-slate-400">I want to hire</div>
                    </div>
                  </div>
                </button>

                <button type="button" id="cardWorker"
                        aria-pressed="{{ old('role') === 'worker' ? 'true' : 'false' }}"
                        class="role-card inline-flex flex-col items-start p-4 rounded-2xl border border-white/8 bg-white/2 transition focus:outline-none">
                  <div class="flex items-center gap-3">
                    <div class="p-2 rounded-md bg-slate-700/10 text-slate-200">
                      <!-- wrench icon -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536M9 11l3 3L21 5l-3-3L9 11z"/></svg>
                    </div>
                    <div class="text-left">
                      <div class="text-sm font-semibold">Professional</div>
                      <div class="text-xs text-slate-400">I want to work</div>
                    </div>
                  </div>
                </button>
              </div>
            </div>

            <!-- name -->
            <div>
              <label class="text-sm text-slate-300 block mb-2">Full name</label>
              <input name="name" value="{{ old('name') }}" required
                     class="w-full rounded-xl px-4 py-3 bg-transparent border border-white/8 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none"
                     placeholder="John Doe" />
            </div>

            <!-- email -->
            <div>
              <label class="text-sm text-slate-300 block mb-2">Email address</label>
              <div class="relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400 pointer-events-none">
                  <!-- mail icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v.217l-8 4.8-8-4.8V5z" /><path d="M18 8.383l-7.555 4.533a1 1 0 01-.89 0L2 8.383V15a2 2 0 002 2h12a2 2 0 002-2V8.383z"/></svg>
                </span>
                <input name="email" value="{{ old('email') }}" required type="email"
                       class="w-full rounded-xl pl-12 pr-4 py-3 bg-transparent border border-white/8 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none"
                       placeholder="you@example.com" />
              </div>
            </div>

            <!-- PHONE + CITY (responsive 1/2) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="text-sm text-slate-300 block mb-2">Phone</label>
                <input name="phone" value="{{ old('phone') }}" type="tel" maxlength="15" inputmode="numeric"
                       class="w-full rounded-xl px-4 py-3 bg-transparent border border-white/8 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none"
                       placeholder="9876543210" />
              </div>

              <div>
                <label class="text-sm text-slate-300 block mb-2">City</label>
                <input name="city" value="{{ old('city') }}" type="text"
                       class="w-full rounded-xl px-4 py-3 bg-transparent border border-white/8 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none"
                       placeholder="Ahmedabad" />
              </div>
            </div>

            <!-- PASSWORDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="text-sm text-slate-300 block mb-2">Password</label>
                <div class="relative">
                  <input name="password" required type="password" id="passwordInput"
                         class="w-full rounded-xl px-4 py-3 bg-transparent border border-white/8 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none"
                         placeholder="Choose a safe password" />
                  <button type="button" id="passToggle" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-200" aria-label="Show password">Show</button>
                </div>
              </div>

              <div>
                <label class="text-sm text-slate-300 block mb-2">Confirm</label>
                <input name="password_confirmation" required type="password"
                       class="w-full rounded-xl px-4 py-3 bg-transparent border border-white/8 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none"
                       placeholder="Repeat password" />
              </div>
            </div>

            <div>
              <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold shadow-lg hover:brightness-105 transition flex items-center justify-center gap-3">
                <svg class="w-5 h-5 opacity-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 12h14M12 5v14"/></svg>
                Get Started
              </button>
            </div>

            <div class="text-center text-slate-400 text-sm">
              Already have an account?
              <a href="{{ route('login') }}" class="text-blue-300 underline ml-1">Log in</a>
            </div>

          </form>
        </div>
      </div>
    </section>
  </main>

  <script>
    // role card logic
    (function(){
      const roleInput = document.getElementById('roleInput');
      const cardCustomer = document.getElementById('cardCustomer');
      const cardWorker = document.getElementById('cardWorker');

      function applyActive(role) {
        if (role === 'worker') {
          cardWorker.classList.add('role-active');
          cardCustomer.classList.remove('role-active');
          cardWorker.setAttribute('aria-pressed', 'true');
          cardCustomer.setAttribute('aria-pressed', 'false');
        } else {
          cardCustomer.classList.add('role-active');
          cardWorker.classList.remove('role-active');
          cardCustomer.setAttribute('aria-pressed', 'true');
          cardWorker.setAttribute('aria-pressed', 'false');
        }
        roleInput.value = role;
      }

      cardCustomer.addEventListener('click', () => applyActive('customer'));
      cardWorker.addEventListener('click', () => applyActive('worker'));

      // init from old value
      applyActive(roleInput.value || 'customer');

      // keyboard accessibility
      [cardCustomer, cardWorker].forEach(el => {
        el.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            el.click();
          }
        });
        el.tabIndex = 0;
      });

      // password toggle
      const passToggle = document.getElementById('passToggle');
      const passwordInput = document.getElementById('passwordInput');
      passToggle.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          passToggle.textContent = 'Hide';
        } else {
          passwordInput.type = 'password';
          passToggle.textContent = 'Show';
        }
      });
    })();
  </script>
</body>
</html>
