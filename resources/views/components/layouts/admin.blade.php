<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }} - AlphaMode</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-200 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-base-300 text-base-content flex flex-col">
            <div class="h-16 flex items-center justify-center font-bold text-xl border-b border-base-content/10">
                AlphaMode Admin
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-2 rounded hover:bg-base-100 {{ request()->routeIs('admin.dashboard') ? 'bg-base-100' : '' }}">Dashboard</a>
                <a href="{{ route('admin.trainers') }}"
                    class="block px-4 py-2 rounded hover:bg-base-100 {{ request()->routeIs('admin.trainers') ? 'bg-base-100' : '' }}">Trainers</a>
                <a href="{{ route('admin.members') }}"
                    class="block px-4 py-2 rounded hover:bg-base-100 {{ request()->routeIs('admin.members') ? 'bg-base-100' : '' }}">Members</a>
                <a href="{{ route('admin.plans') }}"
                    class="block px-4 py-2 rounded hover:bg-base-100 {{ request()->routeIs('admin.plans') ? 'bg-base-100' : '' }}">Membership
                    Plans</a>
                <a href="{{ route('admin.classes') }}"
                    class="block px-4 py-2 rounded hover:bg-base-100 {{ request()->routeIs('admin.classes') ? 'bg-base-100' : '' }}">Workout
                    Classes</a>
                <a href="{{ route('admin.schedules') }}"
                    class="block px-4 py-2 rounded hover:bg-base-100 {{ request()->routeIs('admin.schedules') ? 'bg-base-100' : '' }}">Schedule</a>
            </nav>
            <div class="p-4 border-t border-base-content/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 rounded hover:bg-error/20 text-error hover:text-error-content transition-colors">Logout</button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Header for Toggle -->
            <header class="bg-base-100 shadow px-8 py-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold">{{ $title ?? 'Dashboard' }}</h2>
                <div class="flex items-center gap-4">
                    <button id="theme-toggle" type="button" class="btn btn-ghost btn-circle">
                        <svg id="theme-toggle-light-icon" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z">
                            </path>
                        </svg>
                        <svg id="theme-toggle-dark-icon" class="hidden h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 10a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </header>

            <main class="flex-1 p-8 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>

</html>