<html class="h-full bg-gray-950">
    <script src="https://cdn.tailwindcss.com"></script>
  <body class="h-full">

<div class="min-h-screen flex">
    
    <!-- Left Side - Branding -->
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-slate-950 to-zinc-950 items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(#22d3ee_1px,transparent_1px)] [background-size:40px_40px] opacity-5"></div>
        
        <div class="relative z-10 max-w-md text-center px-8">
            <div class="flex items-center justify-center gap-3 mb-8">
                <div class="w-14 h-14 bg-emerald-500 rounded-2xl flex items-center justify-center text-3xl font-bold text-white shadow-xl shadow-emerald-500/50">
                    $
                </div>
                <h1 class="text-5xl font-bold tracking-tighter text-white">Pay<span class="text-emerald-400">Flow</span></h1>
            </div>
            
            <h2 class="text-4xl font-semibold text-white leading-tight mb-4">
                Smart Payroll.<br>Simplified.
            </h2>
            <p class="text-xl text-slate-400">
                Manage salaries, taxes, and employee payments with confidence.
            </p>

            <div class="mt-16 grid grid-cols-3 gap-6 text-left">
                <div>
                    <p class="text-emerald-400 text-3xl font-mono font-bold">99.9%</p>
                    <p class="text-slate-500 text-sm">Uptime</p>
                </div>
                <div>
                    <p class="text-emerald-400 text-3xl font-mono font-bold">24h</p>
                    <p class="text-slate-500 text-sm">Processing</p>
                </div>
                <div>
                    <p class="text-emerald-400 text-3xl font-mono font-bold">10k+</p>
                    <p class="text-slate-500 text-sm">Employees</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="flex-1 flex items-center justify-center p-6 bg-zinc-950">
        <div class="w-full max-w-md">
            
            <!-- Mobile Logo -->
            <div class="lg:hidden flex justify-center mb-10">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center text-4xl font-bold text-white">
                        $
                    </div>
                    <h1 class="text-4xl font-bold tracking-tighter text-white">Pay<span class="text-emerald-400">Flow</span></h1>
                </div>
            </div>

            <div class="mb-10 text-center lg:text-left">
                <h2 class="text-3xl font-semibold text-white">Sign in</h2>
                <p class="text-slate-400 mt-2">Access your payroll dashboard</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 space-y-2">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-400 bg-red-500/10 border border-red-500/30 rounded-2xl px-4 py-3 text-sm">
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('action.login') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email Address</label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        required 
                        autocomplete="email"
                        class="w-full bg-zinc-900 border border-zinc-700 focus:border-emerald-500 focus:ring-emerald-500/30 rounded-2xl px-5 py-4 text-white placeholder:text-slate-500 outline-none transition-all"
                    />
                </div>

                <div>
                    <div class="flex justify-between mb-2">
                        <label for="password" class="text-sm font-medium text-slate-300">Password</label>
                        <a href="#" class="text-sm text-emerald-400 hover:text-emerald-300 transition-colors">Forgot password?</a>
                    </div>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                        class="w-full bg-zinc-900 border border-zinc-700 focus:border-emerald-500 focus:ring-emerald-500/30 rounded-2xl px-5 py-4 text-white placeholder:text-slate-500 outline-none transition-all"
                    />
                </div>

                <div class="pt-4">
                    <button 
                        type="submit"
                        class="w-full bg-emerald-500 hover:bg-emerald-600 transition-all duration-200 text-white font-semibold py-4 rounded-2xl text-lg shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:-translate-y-0.5 active:scale-[0.985]">
                        Sign In to Dashboard
                    </button>
                </div>
            </form>

            <p class="mt-8 text-center text-slate-400 text-sm">
                Don't have an account? 
                <a href="#" class="text-emerald-400 hover:text-emerald-300 font-medium">Request admin access</a>
            </p>

        </div>
    </div>
</div>

  </body>
</html>