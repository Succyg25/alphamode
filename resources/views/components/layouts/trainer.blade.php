<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' | ' : '' }}{{ config('app.name') }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-200 font-sans antialiased">
    <div class="min-h-screen flex overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 glass-sidebar text-base-content flex flex-col z-50">
            <div class="h-20 flex items-center px-8 border-b border-white/5">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-xl premium-gradient-1 flex items-center justify-center shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined text-white">bolt</span>
                    </div>
                    <span class="font-display font-bold text-xl tracking-tight">Alpha<span
                            class="text-primary">Mode</span></span>
                </div>
            </div>

            <div class="flex-1 px-4 py-8 space-y-1 overflow-y-auto">
                <div class="px-4 mb-4">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-base-content/40">Main Menu</p>
                </div>

                <a href="{{ route('trainer.dashboard') }}"
                    class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('trainer.dashboard') ? 'bg-primary text-primary-content shadow-lg shadow-primary/20' : 'hover:bg-white/5' }}">
                    <span
                        class="material-symbols-outlined text-[22px] {{ request()->routeIs('trainer.dashboard') ? '' : 'text-base-content/60 group-hover:text-primary' }}">dashboard</span>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('dashboard') }}"
                    class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 hover:bg-white/5">
                    <span
                        class="material-symbols-outlined text-[22px] text-base-content/60 group-hover:text-primary">person</span>
                    <span class="font-medium">My Profile</span>
                </a>
            </div>

            <div class="p-6 border-t border-white/5 bg-black/5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="group w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-error/10 text-base-content/60 hover:text-error transition-all duration-300">
                        <span class="material-symbols-outlined text-[22px]">logout</span>
                        <span class="font-medium">Sign Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header
                class="h-20 bg-base-100/50 backdrop-blur-md border-b border-white/5 px-8 flex justify-between items-center z-40">
                <div>
                    <h2 class="text-xl font-bold font-display tracking-tight">{{ $title ?? 'Overview' }}</h2>
                    <p class="text-xs text-base-content/50">{{ now()->format('l, F j, Y') }}</p>
                </div>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-3 px-4 py-2 bg-base-300/50 rounded-2xl border border-white/5">
                        <div
                            class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center overflow-hidden border border-primary/20">
                            <span class="material-symbols-outlined text-primary text-sm">person</span>
                        </div>
                        <span class="text-sm font-semibold tracking-tight">{{ auth()->user()->name }}</span>
                    </div>

                    <button id="theme-toggle" type="button"
                        class="btn btn-ghost btn-circle btn-sm bg-base-300/50 border border-white/5">
                        <span class="material-symbols-outlined text-[20px]"
                            id="theme-toggle-light-icon">light_mode</span>
                        <span class="material-symbols-outlined hidden text-[20px]"
                            id="theme-toggle-dark-icon">dark_mode</span>
                    </button>
                </div>
            </header>

            <main class="flex-1 p-8 overflow-y-auto">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>