<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayFlow Admin Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }
    </script>
    @livewireStyles
</head>
<body class="bg-zinc-950 text-slate-200">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-72 bg-zinc-900 border-r border-zinc-800 transform -translate-x-full md:translate-x-0 transition-all duration-300 z-50 flex flex-col">

        <!-- Logo -->
        <div class="p-6 border-b border-zinc-800 flex items-center gap-3">
            <div class="w-10 h-10 bg-emerald-500 rounded-2xl flex items-center justify-center text-3xl font-bold text-white shadow-lg shadow-emerald-500/30">
                $
            </div>
            <div>
                <h1 class="text-3xl font-bold tracking-tighter text-white">Pay<span class="text-emerald-400">Flow</span></h1>
            </div>
        </div>

        <nav class="flex-1 mt-6 px-4 space-y-1">
            <a href="#" class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-zinc-800 text-emerald-400 bg-zinc-800/50">
                🏠 <span class="font-medium">Dashboard</span>
            </a>
            <a href="/user" class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-zinc-800 transition-colors">
                👤 <span class="font-medium">Users</span>
            </a>
            <a href="/position" class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-zinc-800 transition-colors">
                💼 <span class="font-medium">Positions</span>
            </a>
            <a href="/employee" class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-zinc-800 transition-colors">
                👥 <span class="font-medium">Employees</span>
            </a>
            <a href="/payroll" class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-zinc-800 transition-colors">
                💰 <span class="font-medium">Payroll</span>
            </a>
            <a href="/admin/attendance" class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-zinc-800 transition-colors">
                📅 <span class="font-medium">Attendance</span>
            </a>
        </nav>

        <div class="p-4 border-t border-zinc-800">
            <a href="/logout" 
               class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-red-500/10 hover:text-red-400 text-red-400 transition-colors">
                ⭍ <span class="font-medium">Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col md:ml-72">

        <!-- Navbar -->
        <header class="bg-zinc-900 border-b border-zinc-800 px-6 py-4 flex items-center justify-between">
            <button onclick="toggleSidebar()" class="md:hidden text-2xl text-slate-400">
                ☰
            </button>

            <h1 class="text-2xl font-semibold text-white">Dashboard Overview</h1>

            <!-- Profile Dropdown -->
            <div class="relative group">
                <button class="flex items-center gap-3 hover:bg-zinc-800 px-3 py-2 rounded-2xl transition-colors">
                    <img 
                        src="{{ Auth::user()->avatar ?? Auth::user()->profile_photo_url ?? 'https://i.pravatar.cc/128?u=' . Auth::user()->email }}" 
                        alt="Profile"
                        class="w-9 h-9 rounded-2xl object-cover ring-2 ring-emerald-500/30 cursor-pointer"
                    >
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name ?? Auth::user()->email }}</p>
                        <p class="text-xs text-emerald-400">Administrator</p>
                    </div>
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-56 bg-zinc-900 border border-zinc-700 rounded-3xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50 py-2">
                    <a href="/profile" 
                       class="flex items-center gap-3 px-6 py-3 hover:bg-zinc-800 text-slate-300 hover:text-white">
                        👤 Edit Profile
                    </a>
                    <a href="/profile#photo" 
                       class="flex items-center gap-3 px-6 py-3 hover:bg-zinc-800 text-slate-300 hover:text-white">
                        📸 Change Profile Picture
                    </a>
                    <div class="border-t border-zinc-700 my-1"></div>
                    <a href="/logout" 
                       class="flex items-center gap-3 px-6 py-3 hover:bg-red-500/10 text-red-400">
                        ⭍ Logout
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 overflow-y-auto bg-zinc-950">
            @yield('content')
        </main>
    </div>
</div>

@livewireScripts
</body>
</html>